# ShopAPI
RESTFUL API for a coffee shop done in PHP

# Contents of .htaccess file

#Turn rewrite engine on
Options +FollowSymlinks
RewriteEngine on

#disable directory browsing
Options -Indexes

#PROTECT ENV FILE
<Files .htaccess>
order allow,deny
Deny from all
</Files>

#map neat URL to internal URL for products
RewriteRule ^products/list/$   api/routes/RestRouter.php?res=products&page_key=list [nc,qsa]
RewriteRule ^products/list$    api/routes/RestRouter.php?res=products&page_key=list [nc,qsa]

RewriteRule ^products/create/$   api/routes/RestRouter.php?res=products&page_key=create [L]
RewriteRule ^products/create$   products/create/ [L,R=301]

RewriteRule ^products/delete/([0-9]+)/$   api/routes/RestRouter.php?res=products&page_key=delete&id=$1 [L]
RewriteRule ^products/delete([0-9]+)$   products/delete/$1 [L,R=301]

RewriteRule ^products/update/([0-9]+)/$   api/routes/RestRouter.php?res=products&page_key=update&id=$1 [L]
RewriteRule ^products/update([0-9]+)$   products/update/$1/ [L,R=301]


#map neat URL to internal URL for orders
RewriteRule ^orders/list/$   api/routes/RestRouter.php?res=orders&page_key=list [nc,qsa]
RewriteRule ^orders/list$    api/controllers/RestRouter.php?res=orders&page_key=list [nc,qsa]

RewriteRule ^orders/create/$   api/routes/RestRouter.php?res=orders&page_key=create [L]
RewriteRule ^orders/create$    orders/create/ [L,R=301]

RewriteRule ^orders/delete/([0-9]+)/$   api/routes/RestRouter.php?res=orders&page_key=delete&id=$1 [L]
RewriteRule ^orders/delete([0-9]+)$     orders/delete/$1 [L,R=301]


#map neat URL to internal URL for users
RewriteRule ^users/login/$   api/routes/RestRouter.php?res=users&page_key=login [nc,qsa]
RewriteRule ^users/login$    api/routes/RestRouter.php?res=users&page_key=login [nc,qsa]

RewriteRule ^users/signup/$   api/routes/RestRouter.php?res=users&page_key=signup [L]
RewriteRule ^users/signup    users/signup/ [L,R=301]

RewriteRule ^users/delete/([0-9]+)/$   api/routes/RestRouter.php?res=users&page_key=delete&id=$1 [L]
RewriteRule ^users/delete([0-9]+)$     users/delete/$1 [L,R=301]

