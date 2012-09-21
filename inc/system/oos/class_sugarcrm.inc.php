<?php
//namespace SugarCRM;
/**
 * This class connects to the sugarcrm rest interface and provides
 * basic operations.
 *
 * @author Jens Jahnke <jan0sch@gmx.net>
 */
class sugarcrm {
  // Change this to <code>FALSE</code> to disable ssl verification (for self signed certificates).
  private static $CURL_SSL_VERIFY = TRUE;
  // The base path to the rest api entry point.
  private static $base_path = '/service/v4/rest.php';
  // The base url to the sugarcrm instance without trailing slash!
  private $base_url = '';
  // The session id for the sugarcrm rest session.
  private $session = '';

  /**
   * Constructor.
   *
   * @param string $url The base url to your sugarcrm instance without trailing slash!
   * @param string $login The login name of the webservice user.
   * @param string $password The password for the webservice user.
   * @throws \Exception
   */
  public function __construct($url, $login, $password) {
    $url = trim((string)$url);
    if (empty($url)) {
      throw new \Exception("SugarCRM url not set!");
    }
    $login = trim((string)$login);
    if (empty($login)) {
      throw new \Exception("Login not set!");
    }
    $password = trim((string)$password);
    if (empty($password)) {
      throw new \Exception("Password not set!");
    }
    $this->base_url = $url;
    $this->login($login, $password);
    if (empty($this->session)) {
      throw new \Exception("Could not login!");
    }
  }

  /**
   * Build the name value list for the sugar api.
   *
   * @param \stdClass $bean The simple class the represents the bean.
   * @return array A name value list as expected by the sugarcrm api.
   */
  private function _build_name_value_list($bean) {
    $name_value_list = array();
    $entry = NULL;
    foreach ($bean as $key => $value) {
      if ($key != 'module_name') {
        $entry = new \stdClass();
        $entry->name = $key;
        $entry->value = $value;
        $name_value_list["$key"] = $entry;
      }
    } // foreach
    return $name_value_list;
  }

  /**
   * Converts a given bean object from the api into a simple class
   * that is better to handle.
   *
   * @param \stdClass $bean The bean that should be converted.
   * @throws \Exception
   * @return \stdClass
   */
  private function _convert_to_simple_class(&$bean) {
    if (empty($bean)) {
      throw new \Exception("Empty bean given!");
    }
    $new_bean = new \stdClass();
    $new_bean->id = $bean->id;
    $new_bean->module_name = $bean->module_name;
    foreach ($bean->name_value_list as $key => $value) {
      $new_bean->$key = $value->value;
    }

    return $new_bean;
  }

  /**
   * Loads a bean of the given type and the given id from the database.
   *
   * @param string $type The type of the bean (Contacts, Meetings, ...).
   * @param string $id The id of the bean.
   * @return mixed Returns the bean if it exists or <code>FALSE</code> otherwise.
   */
  public function load_bean($type, $id) {
    $type = trim((string)$type);
    $id = trim((string)$id);
    $data = array(
      'session' => $this->session,
      'modulename' => $type,
      'id' => $id,
    );
    $response = $this->query('get_entry', $data);
    $bean = $response->entry_list[0];
    if ((int)$bean->name_value_list->deleted->value === 0) {
      return $this->_convert_to_simple_class($bean);
    }
    return FALSE;
  }


  /**
  * create a bean from a query result
  */
  public function build_bean($qr)
  {
    return $this->_convert_to_simple_class($qr);
  }

  /**
   * Loads a list of beans from the database.
   *
   * @param string $type The type of the bean (Contacts, Meetings, ...).
   * @param array $options An array containing the options for the query (see sugar docs for details).
   * @return array An array containing the results.
   */
  public function load_beans($type, $options = array()) {
    $type = trim((string)$type);
    $data = array(
      'session' => $this->session,
      'modulename' => $type,
    );
    if (!empty($options)) {
      foreach ($options as $key => $value) {
        if (empty($data["$key"])) {
          $data["$key"] = $value;
        }
      } // foreach
    }
    $response = $this->query('get_entry_list', $data);
    $results = array();
    if (!empty($response->entry_list)) {
      foreach($response->entry_list as $entry) {
        $results[] = $this->_convert_to_simple_class($entry);
      } // foreach
    }
    return $results;
  }

  /**
   * Loads a list of beans from the database by their ids.
   *
   * @param string $type The type of the bean (Contacts, Meetings, ...).
   * @param array $ids An array holding the ids of the beans to load.
   * @return array An array containing the results.
   */
  public function load_beans_by_ids($type, $ids) {
    $type = trim((string)$type);
    $data = array(
      'session' => $this->session,
      'modulename' => $type,
      'ids' => $ids,
    );
    $response = $this->query('get_entries', $data);
    $results = array();
    if (!empty($response->entry_list)) {
      foreach($response->entry_list as $entry) {
        $results[] = $this->_convert_to_simple_class($entry);
      } // foreach
    }
    return $results;
  }

  /**
   * Saves the given bean to the database.
   *
   * @param \stdClass $bean The simple class the represents the bean.
   * @throws \Exception
   * @return bool Returns <code>TRUE</code> on success and <code>FALSE</code> on failure.
   */
  public function save_bean($bean) {



    if (empty($bean->id)) {
      throw new \Exception("Bean has no ID!");
    }

    if (empty($bean->module_name)) {
      throw new \Exception("Bean type (module_name) is not set!");
    }

    $type = trim((string)$bean->module_name);
    $data = array(
      'session' => $this->session,
      'modulename' => $type,
      'name_value_list' => $this->_build_name_value_list($bean),
    );

    $response = $this->query('set_entry', $data);


    if (!empty($response->id)) 
    {

        return TRUE;
    }
    return FALSE;
  }

  /**
   * Returns the complete url to the sugarcrm rest api entry point.
   *
   * @return string An url.
   */
  private function get_sugar_url() {
    return $this->base_url . self::$base_path;
  }

  /**
   * Execute a REST call and return the response.
   *
   * @param string $method The method of the SugarCRM REST-API to call.
   * @param array $arguments An array holding the arguments for the call.
   * @return mixed Either an <code>array</code> holding the response or <code>FALSE</code>.
   */
  public function query($method, $arguments) {
    $method = trim((string)$method);
    // Set session id if not already present.
    if ($method != 'login' && !empty($this->session) && empty($arguments['session'])) 
    {
      $n = $arguments;
      $arguments = array();
      $arguments['session'] = $this->session;
      foreach($n as $k => $v)
      {
        $arguments[$k] = $v;
      }
    }

    $url = $this->get_sugar_url();
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $args = array(
      'method' => $method,
      'input_type' => 'JSON',
      'response_type' => 'JSON',
      'rest_data' => json_encode($arguments),
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($args));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::$CURL_SSL_VERIFY);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response);
    if (!empty($result)) {
      return $result;
    }
    return FALSE;
  }

  /**
   * Sign in to sugarcrm rest api and return the session id.
   * The internal field session is updated with the session id by this
   * method.
   *
   * @param string $login The username.
   * @param string $password The sugarcrm password.
   * @return string The session id upon successful login.
   */
  public function login($login, $password) {
    $login = trim((string)$login);
    $password = trim((string)$password);
    $data = array(
      'user_auth' => array(
        'user_name' => $login,
        'password' => hash('md5', $password),
        'version' => '1.0',
      ),
      'application_name' => 'SugarCRM-Client PHP Library',
    );
    $result = $this->query('login', $data);
    $this->session = trim((string)$result->id);
    return $this->session;
  }

  /**
   * Sign out from the sugarcrm rest api.
   */
  public function logout() {
    $data = array(
      'session' => $this->session,
    );
    $this->query('logout', $data);
  }
}