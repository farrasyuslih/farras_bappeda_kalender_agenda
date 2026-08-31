import './bootstrap';
import jqueryUrl from './jquery-4.0.0.min.js?url';

window.jQueryReady = new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = jqueryUrl;
    script.onload = () => resolve(window.jQuery);
    script.onerror = reject;
    document.head.appendChild(script);
});
