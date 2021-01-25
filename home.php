<?php
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }else 

    $session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';

//echo $_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Notes</title>
    
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <!-- jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    

    <script type = "text/javascript">
        var currentUserID = '<?php echo $session_value;?>';
    </script>

    <script type="text/javascript" src="js/app.js">s</script>

</head>
<body>
    <div class="index_btn">
        <button type="button" class="btn btn-primary" id="logOut">Log-out?</button>
        <!-- <button><a href="login.php"> Sign In</a></button>
        <button><a href="registration.php"> Register here!</a></button> -->
    </div>
    <h1 class="heading">My Notes</h1>
    <div class="container">
        <div class="row">
            <button class="col-1 offset-10 btn btn-primary" data-toggle="modal" data-target="#addNoteModal">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="notes">
            <ul class="notes_list">
                
            </ul>
        </div>
    </div>

    <!-- MODALS -->
    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNoteModalLabel">New Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="note-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="note-name">
                    </div>
                    <div class="form-group">
                        <label for="note-description" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="note-description"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_note">Add Note</button>
                </div>
            </div>
        </div>
    </div>

    

    <div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="editNoteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNoteModalLabel">Edit Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="note-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="editnote-name">
                    </div>
                    <div class="form-group">
                        <label for="note-description" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="editnote-description"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit_note">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>