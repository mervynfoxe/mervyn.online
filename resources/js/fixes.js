// Fix for Cusdis box height
// Ref: https://github.com/djyde/cusdis/issues/283#issuecomment-2436307442
window.addEventListener('load', function () {
    setTimeout(() => {
        let elem = document.querySelector("#cusdis_thread iframe");
        if (elem) {
            let scrollHeight = elem.contentWindow.document.body.scrollHeight;
            elem.style.height = scrollHeight + "px";
        }
    }, 1000);
});
