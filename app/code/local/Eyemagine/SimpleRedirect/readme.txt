/**
 * EYEMAGINE - The leading Magento Solution Partner
 *
 * SimpleRedirect
 *
 * @author    EYEMAGINE <magento@eyemaginetech.com>
 * @category  Eyemagine
 * @package   Eyemagine_SimpleRedirect
 * @copyright Copyright (c) 2013 EYEMAGINE Technology, LLC (http://www.eyemaginetech.com)
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 */

-------------------------------------------------------------------------------
DESCRIPTION:
-------------------------------------------------------------------------------

Redirects a customer to the parent configurable product when linked to a
simple product.

There are checks to make sure the configurable product will be visible before
redirecting, but it assumes that any simple product belonging to a configurable
product is going to be redirected, regardless of the simple product's
visibility.

In the case that a simple product belongs to multiple configurable products, the
first one found is used.

Module Files:

  - app/etc/modules/Eyemagine_SimpleRedirect.xml
  - app/code/local/Eyemagine/SimpleRedirect/*


-------------------------------------------------------------------------------
COMPATIBILITY:
-------------------------------------------------------------------------------

  - Tested only in Magento Enterprise Edition 1.12.0.2
  

-------------------------------------------------------------------------------
RELEASE NOTES:
-------------------------------------------------------------------------------
    
v0.1.0: October 22, 2013
  - Initial release
