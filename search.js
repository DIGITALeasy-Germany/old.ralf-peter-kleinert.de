(function () {
  'use strict';
  function normalize(value) {
    return value.toLocaleLowerCase('de').normalize('NFC');
  }
  function parse(query) {
    var tokens = query.match(/"[^"]+"|\S+/g) || [];
    var groups = [[]];
    tokens.forEach(function (token) {
      if (/^(or|oder)$/i.test(token)) {
        if (groups[groups.length - 1].length) groups.push([]);
      } else {
        groups[groups.length - 1].push(normalize(token.replace(/^"|"$/g, '')));
      }
    });
    return groups.filter(function (group) { return group.length; });
  }
  function search(pages, query) {
    var groups = parse(query);
    if (query.trim().length < 3 || !groups.length) return [];
    return pages.filter(function (page) {
      var text = normalize(page.title + ' ' + page.text);
      return groups.some(function (group) {
        return group.every(function (term) { return text.indexOf(term) !== -1; });
      });
    }).sort(function (a, b) {
      var terms = [].concat.apply([], groups);
      function score(page) {
        return terms.filter(function (term) { return normalize(page.title).indexOf(term) !== -1; }).length;
      }
      return score(b) - score(a) || a.title.localeCompare(b.title, 'de');
    });
  }
  function snippet(text, query) {
    var lower = normalize(text);
    var positions = [].concat.apply([], parse(query)).map(function (term) { return lower.indexOf(term); }).filter(function (position) { return position >= 0; });
    var start = positions.length ? Math.max(0, Math.min.apply(null, positions) - 70) : 0;
    if (start) {
      var nextSpace = text.indexOf(' ', start);
      if (nextSpace >= 0 && nextSpace < start + 30) start = nextSpace + 1;
    }
    var end = Math.min(text.length, start + 260);
    return (start ? '… ' : '') + text.slice(start, end) + (end < text.length ? ' …' : '');
  }
  window.SiteSearch = { parse: parse, search: search, snippet: snippet };
  document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('search');
    var input = document.getElementById('suchbegriff');
    var output = document.getElementById('search-results');
    if (!form || !input || !output) return;
    function message(value) {
      var paragraph = document.createElement('p');
      paragraph.textContent = value;
      output.appendChild(paragraph);
    }
    function render(query) {
      output.textContent = '';
      if (query.trim().length < 3) {
        message('Bitte geben Sie mindestens 3 Zeichen ein.');
        return;
      }
      if (!Array.isArray(window.SITE_SEARCH_INDEX)) {
        message('Der Suchindex konnte nicht geladen werden. Bitte laden Sie die Seite erneut.');
        return;
      }
      var results = search(window.SITE_SEARCH_INDEX, query);
      message(results.length + ' Treffer' + ' für „' + query + '“. Durchsuchte Seiten: ' + window.SITE_SEARCH_INDEX.length + '.');
      if (!results.length) {
        message('Keine passenden Seiten gefunden. Versuchen Sie einen allgemeineren Suchbegriff.');
        return;
      }
      var list = document.createElement('ol');
      results.forEach(function (page) {
        var item = document.createElement('li');
        var link = document.createElement('a');
        link.href = page.url;
        link.textContent = page.title;
        var paragraph = document.createElement('p');
        paragraph.textContent = snippet(page.text, query);
        item.appendChild(link);
        item.appendChild(paragraph);
        list.appendChild(item);
      });
      output.appendChild(list);
    }
    function fromURL() {
      var query = new URLSearchParams(window.location.search).get('q') || '';
      input.value = query;
      if (query) render(query);
      else { output.textContent = ''; message('Geben Sie einen Suchbegriff ein.'); }
    }
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      var query = input.value.trim();
      var url = new URL(window.location.href);
      if (query) url.searchParams.set('q', query);
      else url.searchParams.delete('q');
      window.history.pushState(null, '', url);
      render(query);
    });
    window.addEventListener('popstate', fromURL);
    fromURL();
  });
}());
