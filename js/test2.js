$(document).ready(function() {
    var followers_info = "";
    var screen_name = "";
    var c = 0;
    var d = 0;
    // get logged in user detail
    function fetchUserInfo() {
        $.ajax({
            url: './controller.php?userdata=true',
            dataType: 'json',
            type: 'GET',
            success: function(results) {
                 $('#test2').hide();
                $("#name_user").html(results.name);
                $("#user_pic").attr('src', results.propic);
                $('#followers-names').attr('data-value', results.screen_name);
                var list = '';
                var length = results.tweets.length;
                length = (length >= 10) ? 10 : length;
                screen_name = results.screen_name;
                for (i = 0; i < length; i++) {
                        list += '<div>' + results.tweets[i].text + '</div><br>';
                        c = c+1;
                }
                $('#test1').slick("slickAdd",list);
                $('#test1').slick("slickNext");
                $('#test1').slick("slickRemove");
                fetchFollowersInfo();
            }
        });
    }

    // get follower detail
    function fetchFollowersInfo() {
        $.ajax({
            url: './controller.php?fetchFollowers=' + screen_name,
            dataType: 'json',
            type: 'GET',
            success: function(results) {
                var list = "";
                var length = results.followers.length;
                followers_info = results.followers;
                length = (length >= 10) ? 10 : length;
                for (i = 0; i < length; i++) {
                    var id = results.followers[i].screen_name;
                    var anchor = "<a class='followers-name' data-value='" + id + "' >&nbsp;&nbsp;&nbsp;" + results.followers[i].name + "</a>";
                    list += "<div class='col-md-12 follower'>" + "<img src='" + results.followers[i].propic + "' " + "  />" + anchor + "</div>";
                }
                $('#followers').html(list);
            }
        });
    }

    // display follower tweet in slick slider
    $(document.body).on('click', '.followers-name', function() {
        var id = $(this).attr('data-value');
        $.ajax({
            url: './controller.php?followers=true&usr_id=' + id,
            dataType: 'json',
            type: 'GET',
            success: function(results) {
            //     //  $('#test1').hide();
            //      $('#test2').show();
            //     // for(i=0;i<c;i++) {
            //     //     $('#test1').slick('slickRemove', $('.slick-slide').index(i));
            //     // }
            // //     if(d == 0) {
            // //     for(j=0;j<d;j++) {
            // //         $('#test2').slick('slickRemove', $('.slick-slide').index(j));
            // //     }
            // // }
            //     // $('#test2').html("");
            //     var name = results.name;
            //     var list = '';
            //     var length = results.tweets.length;
            //     length = (length >= 10) ? 10 : length;
            //     for (i = 0; i < length; i++) {
            //             list += '<div>' + results.tweets[i].text + '</div><br>';
            //             d = d +1;
            //     }
            //     list = (length == 0) ? '<br />' : list;
            //     $('#test2').slick("slickAdd",list);
            //     $('#test2').slick("slickNext");
            //     $('#test2').slick("slickRemove");
            //     fetchFollowersInfo();
            }
        });
    });

    // searchbox in follower display
    $(document).on('input', '#searchbox', function() {
        var data = $(this).val();
        var list = '';
        if (data != "") {
            var length = followers_info.length;
            var pattern = new RegExp("^.*" + data + ".*$", 'i');
            for (i = 0; i < length; i++) {
                var name = followers_info[i].name;
                if (pattern.test(name) == true) {
                    var id = followers_info[i].screen_name;
                    var anchor = "<a class='followers-name' data-value='" + id + "' >&nbsp;&nbsp;&nbsp;" + name + "</a>";
                    list += "<div class='col-md-12 follower'>" + "<img src='" + followers_info[i].propic + "' " + " />" + anchor + "</div><br /><br />";
                }
            }
        }
        $('#search').html(list);
    });

    // slick slider
    $(".vertical-center-2").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2
      });

// autosearch https://jqueryui.com/autocomplete/
$( function() {
    $( ".search-box" ).autocomplete({
      source: 'controller.php?autosearch=true'
    });
  } );
 
    fetchUserInfo();
});
