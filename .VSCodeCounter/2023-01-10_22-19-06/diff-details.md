# Diff Details

Date : 2023-01-10 22:19:06

Directory c:\\xampp\\htdocs\\atrodicelabiedru

Total : 66 files,  369 codes, -9 comments, -14 blanks, all 346 lines

[Summary](results.md) / [Details](details.md) / [Diff Summary](diff.md) / Diff Details

## Files
| filename | language | code | comment | blank | total |
| :--- | :--- | ---: | ---: | ---: | ---: |
| [app/Http/Controllers/AdminController.php](/app/Http/Controllers/AdminController.php) | PHP | -5 | -9 | -1 | -15 |
| [app/Http/Controllers/AuthController.php](/app/Http/Controllers/AuthController.php) | PHP | 0 | 2 | 0 | 2 |
| [app/Http/Controllers/MainController.php](/app/Http/Controllers/MainController.php) | PHP | 37 | 48 | 10 | 95 |
| [app/Http/Controllers/Places/PlacesController.php](/app/Http/Controllers/Places/PlacesController.php) | PHP | 13 | 4 | -1 | 16 |
| [app/Http/Controllers/Places/StorePlacesController.php](/app/Http/Controllers/Places/StorePlacesController.php) | PHP | 2 | 0 | -1 | 1 |
| [app/Http/Controllers/Posts/PostsController.php](/app/Http/Controllers/Posts/PostsController.php) | PHP | 4 | 1 | 0 | 5 |
| [app/Http/Controllers/StoreController.php](/app/Http/Controllers/StoreController.php) | PHP | 1 | 1 | 0 | 2 |
| [app/Http/Controllers/UpdateController.php](/app/Http/Controllers/UpdateController.php) | PHP | 14 | 3 | 0 | 17 |
| [app/Http/Controllers/Users/IndexController.php](/app/Http/Controllers/Users/IndexController.php) | PHP | 33 | 1 | 2 | 36 |
| [app/Http/Middleware/AdminMiddleware.php](/app/Http/Middleware/AdminMiddleware.php) | PHP | 0 | 1 | -1 | 0 |
| [app/Http/Middleware/CheckUserIdMiddleware.php](/app/Http/Middleware/CheckUserIdMiddleware.php) | PHP | -1 | -2 | 2 | -1 |
| [app/Http/Middleware/CheckpostOwnerMiddleware.php](/app/Http/Middleware/CheckpostOwnerMiddleware.php) | PHP | 0 | -2 | 0 | -2 |
| [app/Http/Requests/Places/UpdatePlacesRequest.php](/app/Http/Requests/Places/UpdatePlacesRequest.php) | PHP | 6 | 0 | 0 | 6 |
| [app/Http/Requests/Users/UpdateUserRequest.php](/app/Http/Requests/Users/UpdateUserRequest.php) | PHP | -33 | -11 | -6 | -50 |
| [app/Models/Keyword.php](/app/Models/Keyword.php) | PHP | -8 | 0 | -4 | -12 |
| [app/Models/PostKeyword.php](/app/Models/PostKeyword.php) | PHP | -8 | 0 | -4 | -12 |
| [app/Models/PostRating.php](/app/Models/PostRating.php) | PHP | -10 | 0 | -4 | -14 |
| [app/Models/Vehicle.php](/app/Models/Vehicle.php) | PHP | 1 | 0 | 0 | 1 |
| [database/migrations/001_create_users_table.php](/database/migrations/001_create_users_table.php) | PHP | 24 | 10 | 4 | 38 |
| [database/migrations/002_add_role_to_users.php](/database/migrations/002_add_role_to_users.php) | PHP | 19 | 10 | 4 | 33 |
| [database/migrations/003_create_places_table.php](/database/migrations/003_create_places_table.php) | PHP | 19 | 10 | 4 | 33 |
| [database/migrations/004_create_vehicle_table.php](/database/migrations/004_create_vehicle_table.php) | PHP | 19 | 10 | 4 | 33 |
| [database/migrations/005_add_column_soft_deletes_to_vehicle_table.php](/database/migrations/005_add_column_soft_deletes_to_vehicle_table.php) | PHP | 19 | 10 | 4 | 33 |
| [database/migrations/006_create_posts_table.php](/database/migrations/006_create_posts_table.php) | PHP | 26 | 11 | 5 | 42 |
| [database/migrations/007_12_29_223253_add_columns_for_images_to_posts_table.php](/database/migrations/007_12_29_223253_add_columns_for_images_to_posts_table.php) | PHP | 19 | 10 | 4 | 33 |
| [database/migrations/008_add_columns_for_previewimages_to_posts_table.php](/database/migrations/008_add_columns_for_previewimages_to_posts_table.php) | PHP | 19 | 10 | 4 | 33 |
| [database/migrations/009_create_answers_table.php](/database/migrations/009_create_answers_table.php) | PHP | 23 | 14 | 5 | 42 |
| [database/migrations/2022_12_20_144403_create_users_table.php](/database/migrations/2022_12_20_144403_create_users_table.php) | PHP | -27 | -10 | -4 | -41 |
| [database/migrations/2022_12_24_111214_create_vehicle_table.php](/database/migrations/2022_12_24_111214_create_vehicle_table.php) | PHP | -19 | -10 | -4 | -33 |
| [database/migrations/2022_12_24_114035_create_posts_table.php](/database/migrations/2022_12_24_114035_create_posts_table.php) | PHP | -23 | -13 | -4 | -40 |
| [database/migrations/2022_12_24_174832_create_places_table.php](/database/migrations/2022_12_24_174832_create_places_table.php) | PHP | -19 | -13 | -4 | -36 |
| [database/migrations/2022_12_24_181715_add_role_to_users.php](/database/migrations/2022_12_24_181715_add_role_to_users.php) | PHP | -19 | -10 | -4 | -33 |
| [database/migrations/2022_12_24_182654_create_post_rating_table.php](/database/migrations/2022_12_24_182654_create_post_rating_table.php) | PHP | -21 | -14 | -4 | -39 |
| [database/migrations/2022_12_24_183120_create_answers_table.php](/database/migrations/2022_12_24_183120_create_answers_table.php) | PHP | -21 | -14 | -5 | -40 |
| [database/migrations/2022_12_25_131703_create_keywords_table.php](/database/migrations/2022_12_25_131703_create_keywords_table.php) | PHP | -19 | -10 | -4 | -33 |
| [database/migrations/2022_12_25_131948_create_post_keywords_table.php](/database/migrations/2022_12_25_131948_create_post_keywords_table.php) | PHP | -20 | -10 | -4 | -34 |
| [database/migrations/2022_12_26_215837_create_post_tags_table.php](/database/migrations/2022_12_26_215837_create_post_tags_table.php) | PHP | -20 | -10 | -4 | -34 |
| [database/migrations/2022_12_28_101228_add_column_soft_deletes_to_vehicle_table.php](/database/migrations/2022_12_28_101228_add_column_soft_deletes_to_vehicle_table.php) | PHP | -19 | -10 | -4 | -33 |
| [database/migrations/2022_12_29_223253_add_columns_for_images_to_posts_table.php](/database/migrations/2022_12_29_223253_add_columns_for_images_to_posts_table.php) | PHP | -19 | -10 | -4 | -33 |
| [database/migrations/2022_12_29_224122_add_columns_for_previewimages_to_posts_table.php](/database/migrations/2022_12_29_224122_add_columns_for_previewimages_to_posts_table.php) | PHP | -19 | -10 | -4 | -33 |
| [public/css/placescreate.css](/public/css/placescreate.css) | CSS | 0 | 0 | -1 | -1 |
| [public/css/postscreate.css](/public/css/postscreate.css) | CSS | 166 | 6 | 12 | 184 |
| [resources/js/welcome.js](/resources/js/welcome.js) | JavaScript | -31 | -3 | -2 | -36 |
| [resources/views/AboutUs.blade.php](/resources/views/AboutUs.blade.php) | PHP | 22 | 0 | 0 | 22 |
| [resources/views/Adminview.blade.php](/resources/views/Adminview.blade.php) | PHP | 29 | 0 | 1 | 30 |
| [resources/views/Places/Index.blade.php](/resources/views/Places/Index.blade.php) | PHP | 16 | 0 | 0 | 16 |
| [resources/views/Places/create.blade.php](/resources/views/Places/create.blade.php) | PHP | 5 | 0 | -1 | 4 |
| [resources/views/Places/edit.blade.php](/resources/views/Places/edit.blade.php) | PHP | 6 | 0 | 0 | 6 |
| [resources/views/Places/show.blade.php](/resources/views/Places/show.blade.php) | PHP | 7 | 0 | 0 | 7 |
| [resources/views/Posts/Index.blade.php](/resources/views/Posts/Index.blade.php) | PHP | 11 | 0 | 1 | 12 |
| [resources/views/Posts/create.blade.php](/resources/views/Posts/create.blade.php) | PHP | 25 | 0 | 0 | 25 |
| [resources/views/Posts/edit.blade.php](/resources/views/Posts/edit.blade.php) | PHP | 10 | 0 | 0 | 10 |
| [resources/views/Posts/show.blade.php](/resources/views/Posts/show.blade.php) | PHP | 24 | 0 | 0 | 24 |
| [resources/views/SafeTrip.blade.php](/resources/views/SafeTrip.blade.php) | PHP | 22 | 0 | 0 | 22 |
| [resources/views/User/Index.blade.php](/resources/views/User/Index.blade.php) | PHP | -23 | 0 | -1 | -24 |
| [resources/views/User/edit.blade.php](/resources/views/User/edit.blade.php) | PHP | 5 | 0 | 0 | 5 |
| [resources/views/User/show.blade.php](/resources/views/User/show.blade.php) | PHP | 6 | 0 | 0 | 6 |
| [resources/views/Vehicle/Vehicle.blade.php](/resources/views/Vehicle/Vehicle.blade.php) | PHP | 13 | 0 | 0 | 13 |
| [resources/views/Vehicle/create.blade.php](/resources/views/Vehicle/create.blade.php) | PHP | 4 | 0 | 0 | 4 |
| [resources/views/Vehicle/edit.blade.php](/resources/views/Vehicle/edit.blade.php) | PHP | 5 | 0 | 0 | 5 |
| [resources/views/Vehicle/show.blade.php](/resources/views/Vehicle/show.blade.php) | PHP | 6 | 0 | 0 | 6 |
| [resources/views/auth/login.blade.php](/resources/views/auth/login.blade.php) | PHP | -3 | 0 | 0 | -3 |
| [resources/views/navbar/app.blade.php](/resources/views/navbar/app.blade.php) | PHP | 3 | 0 | 1 | 4 |
| [resources/views/traveling/gallery.blade.php](/resources/views/traveling/gallery.blade.php) | PHP | 50 | 0 | 1 | 51 |
| [resources/views/welcome.blade.php](/resources/views/welcome.blade.php) | PHP | 10 | 0 | -1 | 9 |
| [routes/web.php](/routes/web.php) | PHP | 13 | 0 | -1 | 12 |

[Summary](results.md) / [Details](details.md) / [Diff Summary](diff.md) / Diff Details