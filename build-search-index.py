"""Run after changing HTML content: python build-search-index.py"""
from html.parser import HTMLParser
from pathlib import Path
import json
import re


class PageParser(HTMLParser):
    def __init__(self):
        super().__init__(convert_charrefs=True)
        self.title = []
        self.content = []
        self.in_title = False
        self.article = 0
        self.ignore = 0

    def handle_starttag(self, tag, attrs):
        if tag == 'title':
            self.in_title = True
        if tag == 'article':
            self.article += 1
        if tag in ('script', 'style'):
            self.ignore += 1

    def handle_endtag(self, tag):
        if tag == 'title':
            self.in_title = False
        if tag == 'article':
            self.article = max(0, self.article - 1)
        if tag in ('script', 'style'):
            self.ignore = max(0, self.ignore - 1)

    def handle_data(self, data):
        if self.in_title:
            self.title.append(data)
        if self.article and not self.ignore:
            self.content.append(data)


def clean(parts):
    return re.sub(r'\s+', ' ', ' '.join(parts)).strip()


def build(root):
    pages = []
    for path in sorted(root.rglob('*.html')):
        relative = path.relative_to(root)
        if any(part in ('geheim', '.git', 'node_modules', 'wdw_suche') for part in relative.parts):
            continue
        if path.name in ('suchle.html', 'fehlerseite.html') or path.name.startswith('google'):
            continue
        parser = PageParser()
        parser.feed(path.read_text(encoding='utf-8-sig'))
        text = clean(parser.content)
        if text:
            pages.append({'url': relative.as_posix(), 'title': clean(parser.title) or path.stem, 'text': text})
    target = root / 'search-index.js'
    target.write_text('window.SITE_SEARCH_INDEX = ' + json.dumps(pages, ensure_ascii=False).replace('<', '\\u003c') + ';\n', encoding='utf-8')
    print(f'Suchindex: {len(pages)} Seiten, {target.stat().st_size} Bytes')
    return pages


if __name__ == '__main__':
    build(Path(__file__).resolve().parent)
