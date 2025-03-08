(function() {
    const domain = window.track;

    function generateUniqueId() {
        return 'xxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    function getOrSetUniqueId(name) {
        if ('vid' === name) {
            return getOrSetCookie('vid', 60 * 60);
        }

        return getOrSetCookie('uid', 60 * 60 * 24 * 365);
    }

    function getOrSetCookie(cookieName, ttl) {
        let id = document.cookie.split('; ').find(row => row.startsWith(cookieName + '='));
        if (id) {
            id = id.split('=')[1];
        } else {
            id = generateUniqueId();
            document.cookie = `${cookieName}=${id}; path=/; max-age=${ttl}`;
        }
        return id;
    }

    fetch(`${domain}/api/track`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            uid: getOrSetUniqueId(),
            vid: getOrSetUniqueId('vid'),
            agent: navigator.userAgent,
            language: navigator.language,
            url: window.location.href
        })
    }).catch(error => console.error('Error sending visitor info:', error));
})();
