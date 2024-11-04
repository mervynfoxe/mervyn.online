// Fix for Cusdis box height
// Ref: https://github.com/djyde/cusdis/issues/283#issuecomment-2436307442
window.addEventListener('load', function () {
    setTimeout(() => {
        let scrollHeight = document.querySelector("#cusdis_thread iframe").contentWindow.document.body.scrollHeight;
        document.querySelector("#cusdis_thread iframe").style.height = scrollHeight + "px";
    }, 1000);
});
