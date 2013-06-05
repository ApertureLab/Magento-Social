Description
-----------

_Baobaz Social_ provides social features to Magento.

Features list:

* Open Graph tags
* Facebook
 * Facebook meta tags
 * Facebook Like Button
 * Facebook Comments
* Twitter
 * Twitter Tweet Button
* Google
 * Google Plus One Button

_No Magento layout updates needed (uses Magento events)._


Configuration
-------------

* Config
 * System > Configuration > General > Social


Screenshots
-----------

![Baobaz_Social Product view](https://raw.github.com/Narno/Magento_Baobaz_Social/master/doc/screenshots/Baobaz_Social-ProductViewDetails.png "Baobaz_Social Product view")  

* [Product view](https://raw.github.com/Narno/Magento_Baobaz_Social/master/doc/screenshots/Baobaz_Social-ProductView.png)
* [Magento Configuration](https://raw.github.com/Narno/Magento_Baobaz_Social/master/doc/screenshots/Baobaz_Social-Configuration.png)


How to use?
-----------

1. Fill credentials and configure options of each service
2. Put an helper call in your templates. Available Helpers:
 * Like Button: ```<?php echo Mage::helper('baobaz_social/facebook')->getLikeButton($this); ?>```
 * FB Comments: ```<?php echo Mage::helper('baobaz_social/facebook')->getComments(); ?>```
 * Tweet Button: ```<?php echo Mage::helper('baobaz_social/twitter')->getTweetButton(); ?>```
 * Google Plus One Button: ```<?php echo Mage::helper('baobaz_social/google')->getGooglePlusOneButton(); ?>```


Example of meta tags
--------------------

```
<!-- Facebook meta tags -->
<meta property="fb:admins" content="1234567890" />
<meta property="fb:page_id" content="1234567890" />
<meta property="fb:app_id" content="1324567890" />
```

```
<!-- Open Graph meta tags -->
<meta property="og:title" content="My Product" />
<meta property="og:type" content="product" />
<meta property="og:image" content="http://domain.tld/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/images/catalog/product/placeholder/image.jpg" />
<meta property="og:url" content="http://domain.tld/my-product.html" />
<meta property="og:site_name" content="My Website" />
<meta property="og:description" content="The coolest Website ever done" />
```


Third party documentation
-------------------------

* [The Open Graph Protocol](http://ogp.me/)
* Facebook
 * [Open Graph Protocol](http://developers.facebook.com/docs/opengraph/)
 * [Social Plugins: Like Button](http://developers.facebook.com/docs/reference/plugins/like/)
 * [Social Plugins: Comments](http://developers.facebook.com/docs/reference/plugins/comments/)
* Twitter
 * [Tweet Button](https://dev.twitter.com/docs/tweet-button)
* Google
 * [Google+ Platform: +1 Button](https://developers.google.com/+/plugins/+1button/)


To Do
----

* Customizable Open Graph properties?


License
----------

_Baobaz Social_ is released under the terms of the [Open Software License 3.0](http://opensource.org/licenses/OSL-3.0).

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
DEALINGS IN THE SOFTWARE.
