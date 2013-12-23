jQuery(document).ready(function($) {
    //put IDs for sidebar and toggle in vars
    var toggle = "#menu-toggle";
    var slideout = "#secondary-mobile";

    //When toggle is clicked show the slideout
    $( toggle ).toggle(
        //Open Sidebar
        function() {
            $( slideout ).css({
                display: "block"
            });

        },
        //Close Sidebar
        function() {
            $( slideout ).css({
                display: "none"
            });
        }
    );
});