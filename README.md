Magento-SimpleRedirect
======================

Redirects a customer to the parent configurable product when linked to a
simple product.

There are checks to make sure the configurable product will be visible before
redirecting, but it assumes that any simple product belonging to a configurable
product is going to be redirected, regardless of the simple product's
visibility.

In the case that a simple product belongs to multiple configurable products, the
first one found is used.
