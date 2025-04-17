@props([
    'siteTitle' => config('app.name'),
    'pageTitle' => 'Home',
    'seoDescription' => '',
    'seoImage' => '',
    'emailEnc' => '',
])
<!DOCTYPE html>
<html lang="en">
<head>
    <x-html-head
        :title="$siteTitle . ' - ' . $pageTitle"
        :description="$seoDescription"
        :image="$seoImage"
    />
</head>

<body class="font-sans antialiased text-gray-900 dark:text-gray-100 leading-normal tracking-wider bg-cover bg-white dark:bg-gray-800">
<main>
    {{ $content }}
</main>




{{-- TODO bundle these assets, or get rid of them if not needed --}}
<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@4"></script>
<script>
    // TODO move most of this to script file
    const sEmail = '{{ $emailEnc }}';

    function decode(str) {
        return str.replace(/[a-zA-Z]/g, function (c) {
            return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
        });
    }

    //Init tooltips
    tippy('.link',{
        placement: 'bottom'
    })

    //Toggle mode
    // const toggle = document.querySelector('.js-change-theme');
    // let isDarkMode = false;
    //
    // toggle.addEventListener('click', () => {
    //     if (!isDarkMode) {
    //         toggle.innerHTML = "☀️";
    //         document.querySelector('html').classList.add('dark');
    //         isDarkMode = true;
    //     } else {
    //         toggle.innerHTML = "🌙";
    //         document.querySelector('html').classList.remove('dark');
    //         isDarkMode = false;
    //     }
    // });

    // Decode email and update it in the panel
    // If email not set, hide the button
    // TODO should hide the button if JS is disabled as well
    if (typeof sEmail !== 'undefined') {
        let email = decode(sEmail);
        document.querySelector('a.email-link.encoded').setAttribute('href', 'mailto:' + email);
    } else {
        document.querySelector('a.email-link.encoded').remove();
    }

</script>

</body>

</html>
