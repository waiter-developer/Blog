<div class="wrapper_register_form">
    <div class="register_form hide">
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">Sign in</h4>
            <form action="" method="post" class="jsValidForm">
                <div class="jsValidFormGroup form-group">
                    <label>Your email</label>
                    <input class="jsValidInput form-control" placeholder="Email" type="text"  name="email" >
                    <span class="jsValidResponse"></span>
                </div>
                <div class="jsValidFormGroup form-group">
                    <label>Your password</label>
                    <input class="jsValidInput form-control" placeholder="***********" type="password" name="password">
                    <span class="jsValidResponse"></span>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block register_form_sing_submit"><i class="fas fa-sign-in-alt"></i> Login  </button>
                </div>
            </form>
            <hr>
            <div>
                <p>Create an account <a href="../Blog/Login.php">Here!</a></p>
            </div>
        </article>
    </div>
    <div class="modal_window_myprofil">
        <header class="mb-4">
            <h4 class="card-title" style="font-size: 4em; text-align: center;">
                <i class="fas fa-user-circle" style="box-shadow: 0px 0px 10px 4px orange;border-radius: 50%"></i>
            </h4>
        </header>
        <h3 class="modal_window_myprofil--title" >Hello! <br>We are happy see you again!</h3>
        <p class="modal_window_myprofil--fio">Yatsunenko Anatolii</p>
        <p class="text-center modal_window_myprofil--text">You can create a new article, just <a href="createPage.php?id=3">Click right here</a></p>
        <hr>
        <p><a href="../Blog/Logout.php"><i class="fas fa-door-open"></i>Logout</a></p>
    </div>
</div>




