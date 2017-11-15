define([
    '/doc/locales/ca.js',
    '/doc/locales/de.js',
    '/doc/locales/es.js',
    '/doc/locales/fr.js',
    '/doc/locales/it.js',
    '/doc/locales/nl.js',
    '/doc/locales/pl.js',
    '/doc/locales/pt_br.js',
    '/doc/locales/ro.js',
    '/doc/locales/ru.js',
    '/doc/locales/tr.js',
    '/doc/locales/vi.js',
    '/doc/locales/zh.js',
    '/doc/locales/zh_cn.js'
], function() {
    var langId = (navigator.language || navigator.userLanguage).toLowerCase().replace('-', '_');
    var language = langId.substr(0, 2);
    var locales = {};

    for (index in arguments) {
        for (property in arguments[index])
            locales[property] = arguments[index][property];
    }
    if ( ! locales['en'])
        locales['en'] = {};

    if ( ! locales[langId] && ! locales[language])
        language = 'en';

    var locale = (locales[langId] ? locales[langId] : locales[language]);

    function __(text) {
        var index = locale[text];
        if (index === undefined)
            return text;
        return index;
    };

    function setLanguage(language) {
        locale = locales[language];
    }

    return {
        __         : __,
        locales    : locales,
        locale     : locale,
        setLanguage: setLanguage
    };
});
