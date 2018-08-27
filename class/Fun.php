<?php

require_once 'DB.php';

class Fun
{
    private $db;
    private $conn;
    private $username = "";
    private $password = "";

    // constructor
    function __construct()
    {
        // connecting to database
        $this->db = new DB();
        $this->conn = $this->db->connect();
    }

    public function closeDB()
    {
        mysqli_close($this->conn);
    }

    public function newAudio($body, $title, $audio)
    {
        $body = mysqli_real_escape_string($this->conn, $body);
        $title = mysqli_real_escape_string($this->conn, $title);
        $audio = mysqli_real_escape_string($this->conn, $audio);

        $result = mysqli_query($this->conn, "INSERT INTO timenodey(body, title, audio) VALUES('$body', '$title', '$audio')");
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAudio($id, $body, $title, $audio)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $body = mysqli_real_escape_string($this->conn, $body);
        $title = mysqli_real_escape_string($this->conn, $title);
        $audio = mysqli_real_escape_string($this->conn, $audio);


        if (strlen($audio) > 2)
            $audio = ", audio = '$audio'";
        else
            $audio = "";

        $result = mysqli_query($this->conn, "UPDATE timenodey SET title='$title', body='$body' " . $audio . " WHERE id='$id'");

        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delAudio($id)
    {
        $result = mysqli_query($this->conn, "DELETE FROM timenodey WHERE id='$id'");
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function disAudio()
    {
        $result = mysqli_query($this->conn, "SELECT id, body, title,audio from timenodey  ORDER BY id");
        // check for successful store
        if ($result) {
            $records = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $records[] = $row;
            }
            return $records;
        } else {
            return false;
        }
    }

    public function Login()
    {
        //login if password and username correct
        if (!empty($_POST['login'])) {
            if (empty($_POST['username'])) {
                echo("<p class='error'>UserName is empty!</p>");
                return false;
            }

            if (empty($_POST['password'])) {
                echo("<p class='error'>Password is empty!</p>");
                return false;
            }

            $user = trim($_POST['username']);
            $pass = trim($_POST['password']);

            if (($pass != $this->password) || ($user != $this->username)) {
                echo("<p class='error'>Incorrect Username or Password</p>");
                return false;
            }

            $_SESSION[$this->username] = $user;
            return true;
        }
    }

    public function logout()
    {
        if (empty($_GET['logout'])) {
            return false;
        }
        if (trim($_GET['logout']) == "logout") {
            unset($_SESSION[$this->username]);
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION[$this->username])) {
            return true;
        }
        return false;
    }

    public function user()
    {
        return $_SESSION[$this->username];
    }

    public function loginform()
    {
        echo(
        "<form id='login' action='index.php' method='post' accept-charset='UTF-8'>
                  <h2>TIME NO DEY</h2>
                   <p><input type='hidden' name='login' value='1'/></p>
                   <div class=\"wrapo\">
                   <input type='text' name='username' id='username'  placeholder='Username' />
                    </div>
                    
                      <div class=\"wrapo\">
                   <input type='password' name='password' id='password' placeholder='Password' />
                   </div>
                <center><button type='submit' name='Submit'>LOGIN</button></center>
              </form>\"");
    }

    public function audioEditor($id, $title, $body, $audio)
    {
        echo("<div class='editor-overlay'>" .
            "<div class='editor'>" .
            "<img class='close-editor' src='public/imag/close.png' alt='close'>" .

            "<form class='edit-form' action='config/provider.php' method='post' accept-charset='UTF-8' enctype='multipart/form-data'>
                          <h2>Make Changes</h2>
                          <input type='hidden' name='tag' value='editorr'/>
                          <input type='hidden' name='id' class='id' value='" . $id . "'/>
                          <div class='edit-row'>
                              <h3>Title</h3>
                              <p>Enter the Title Here.</p>
                              <p><input type='text' name='title'  value='" . $title . "' /></p>
                          </div>
                          <div class='edit-row'>
                              <h3>Body</h3>
                              <p>Enter the Contents Here.</p>
                              <p><textarea type='text' name='body'  />" . $body . "</textarea></p>
                          </div>
                   
                          <div class='edit-row'>
                              <h>Audio Upload</h>
                              <p>Accepted formats: .MP3 Max file size: 10MB.</p>
                              <p><label for='soundfile'>Filename:</label></p>
                              <p><input type='file' name='soundfile' id='soundfile'><br></p>
                              <p>Current Audio Url: " . $audio . "</p>
                          </div>
                          <center><button type='submit' name='Submit'>Save</button></center>
                      </form>" .
            "</div>" .
            "</div>");
    }

}

