jQuery(document).ready(function($) {
    var frame;

    $('.hawana-upload-button').on('click', function(e) {
        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'Select or Upload Images',
            button: {
                text: 'Use this image'
            },
            multiple: true
        });

        frame.on('select', function() {
            //retrieve selected attachments (images)
            var attachments = frame.state().get('selection').toJSON();
            //Updates the hidden input field (input[name="my_field"]) with the concatenated list of current and new attachment IDs.
            var inputField = $('input[name="my_field"]');
            var currentValue = inputField.val().split(',');
            var newValue = [];

            attachments.forEach(function(attachment) {
                newValue.push(attachment.id);
                $('.hawana-gallery').append(
                    '<li data-id="' + attachment.id + '">' +
                    '<span style="background-image: url(' + attachment.url + ');"></span>' +
                    '<a href="#" class="hawana-gallery-remove">&times;</a>' +
                    '</li>'
                );
            });

            inputField.val(currentValue.concat(newValue).join(','));
        });

        frame.open();
    });

    $(document).on('click', '.hawana-gallery-remove', function(e) {
        e.preventDefault();
        var id = $(this).parent().data('id');
        var inputField = $('input[name="my_field"]');
        var currentValue = inputField.val().split(',');

        currentValue = currentValue.filter(function(value) {
            return value != id;
        });

        inputField.val(currentValue.join(','));
        $(this).parent().remove();
    });
});
