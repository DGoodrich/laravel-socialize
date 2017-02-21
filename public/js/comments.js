$(document).on( 'click', '.reply', function () {
    $(this).closest('footer').find('#post').toggleClass('hidden');
});

$(document).on( 'click', '.cancel', function () {
    $(this).closest('footer').find("textarea[name='comment']").val('');
    $(this).closest('footer').find('#post').toggleClass('hidden');
});

var type = null;
var username = $("input[name='username']").val();

function setType(_type) {
    type = _type;

    //Resets all values for modal box
    $('#search-input').val('');
    $('#load').html('');

    getUsers(1, '');
}

$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        if($(this).closest('div').attr('id') == 'post_links') {
            getPosts($(this).text());
        } else {
            getUsers($(this).text(), '');
        }
    });
});

function getUsers(page, search_value) {
    var search_url = (search_value != '') ? '/user/'+username+'/requests/search/' + search_value : '/user/'+username+'/requests/search/all';

    $.ajax({
        url : search_url,
        method: 'GET',
        data: {
            'page' : page,
            'type' : type
        }
    }).done(function (data) {
        $('#load').html(data);
    });
}

function getPosts(page) {
    $.ajax({
        url : '/user/'+username+'/post/search/all',
        method: 'GET',
        data: {
            'page' : page,
            'user' : username
        }
    }).done(function (data) {
        $('#posts').html(data);
    });
}

$(document).ready(function(){
    $(".remove-post").click(function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/user/'+ username +'/post/'+ postId,
            type: 'post',
            data: {
                _method: 'delete',
                type: postType
            },
            success:function(data) {
                $('#posts').html(data);
                $('#myModal').modal('toggle');
            }
        });

    });
});

var postId = null;
var postType = null;


