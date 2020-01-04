/**
 * Crete user action.
 */
$('#create-btn').on('click', function (e) {
    e.preventDefault();

    process($('form#create-user'));
});

/**
 * Get user by ID action.
 */
$('#get-btn').on('click', function (e) {
    e.preventDefault();

    process($('form#get-user'));
});

/**
 * Delete user by ID action.
 */
$('#delete-btn').on('click', function (e) {
    e.preventDefault();

    process($('form#delete-user'));
});

/**
 * Renders submitted form.
 *
 * @param form
 */
function process(form) {
    var action = form.attr('action');

    $.ajax({
        url: action,
        data: form.serialize(),
        method: form.attr('method')
    }).done(function (response) {
        if (action.indexOf('post') >= 0) {
            alert('User was added.');
        } else if (action.indexOf('get') >= 0) {
            var data = response.user;
            var info = '';

            $.each(data, function (key, value) {
                info += key + ': ' + value + '\n';
            });

            if (info) {
                alert(info);
            }
        } else if (action.indexOf('delete') >= 0) {
            alert('User was deleted.');
        }
    });
}