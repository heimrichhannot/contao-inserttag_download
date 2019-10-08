# Download Inserttag 

Contao download inserttag, to provide downloadable files inside paragraphs, etc. 

> This repository is not maintained anymore. For Contao 4 users, please use our [Inserttags Collection Bundle](https://github.com/heimrichhannot/contao-inserttagcollection-bundle) instead.

## Usage & Examples

'''
{{download::b93b1802-ae7a-11e3-9888-6c626d57edad::My Portfolio::CSS-Class::CSS-ID}} - return den download element with linktext set to "my portfolio" and a given css classname and id
{{download_link::b93b1802-ae7a-11e3-9888-6c626d57edad}} - return the download link
{{download_size::b93b1802-ae7a-11e3-9888-6c626d57edad}} - return the download filesize
'''

### Contao 4.x install

Install via composer, add requirement and run `composer update`.

```
composer.json
"require": {
....
	"heimrichhannot/contao-inserttag_download": "~1.0"
}
```

Register module in app/AppKernel.php.

```

$bundles = [
...

new Contao\CoreBundle\HttpKernel\Bundle\ContaoModuleBundle(('inserttag_download'), $this->getRootDir()),
...
]
```

Clear caches `app/cache`.
