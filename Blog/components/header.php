<div class="wrapper_header_top">
    <div class="container">
        <div class="jsHeaderTop row header_top">
                <div class="col-md col-xl-2 header_top_contact-form-item">
                    <span class="header_top_contact-form--icon"><i class="fas fa-envelope"></i></span>
                    <a href="mailto:info@youremail.com" class="header_top_contact-form--link">info@youremail.com</a>
                </div>
                <div class="col-md col-xl-2 header_top_contact-form-item">
                    <span class="header_top_contact-form--icon"><i class="fas fa-phone-alt"></i></span>
                    <a href="tel:+(56) 123 456 546" class="header_top_contact-form--link">+(56) 123 456 546</a>
                </div>
                <div class="col header_top_contact-form-item">
                    <a href="#" class="jsMyLinkModal header_top_reg-form--link">My Account</a>
                    <div id="myModal" class="modal_window">
                        <?php require_once 'modal.php';?>
                        <span id="myModal_close" class="close"><i class="far fa-times-circle"></i></span>
                    </div>
                    <div id="myOverlay"></div>
                </div>
            <div class="col header_logo_search_input_container input_header_up">
                <input type="search" class="header_logo_search_field input_header_up_field" placeholder="Inter Your Name...">
                <button class="header_logo_search_btn" type="button"><img src="Images/search.png" alt="Search"></button>
            </div>
        </div>
        <div class="hamburger_menu">
            <button class="jsHamburgerMenu hamburger_menu_button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-between header_logo">
        <div class="col-2">
            <a href="index.php">
                <img src="Images/Logo_.png" class="header_logo_img" alt="One plus" title="One plus">
            </a>
        </div>
        <div class="col-6 wrapper_logo_search_input align-self-center">
            <div class="header_logo_search_input_container">
                <input type="search" class="header_logo_search_field" placeholder="Inter Your Name...">
                <button class="header_logo_search_btn" type="button"><img src="Images/search.png" alt="Search"></button>
            </div>
        </div>
    </div>
</div>
