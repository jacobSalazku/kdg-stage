document.addEventListener("DOMContentLoaded", function() {
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['clean']
    ];

    var editorElement = document.getElementById('editor');
    var initialContent = editorElement.getAttribute('data-initial-content');

    var quill = new Quill(editorElement, {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    quill.clipboard.dangerouslyPasteHTML(initialContent);

    quill.on('text-change', function() {
        document.querySelector('#hidden_description').value = quill.root.innerHTML;
    });

    $('form').submit(function () {
        document.querySelector('#hidden_description').value = quill.root.innerHTML;
    });
});
