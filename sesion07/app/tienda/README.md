# Notas

## Relaciones con Eloquent

Tu modelos van en singular y con la primera letra en mayuscula, siguiendo PascalCase.
Las tablas van es singular y con snake_casel
Ejemplo:
    - CartItem (model) -> cart_items (table)

User (users) -> Cart (carts)
                - id
                - user_id
                - created_at
                - updated_at

```sql
-- como obtener el carrito de un usuario
select top 1 * from carts where carts.user_id = {$user->id};

-- como obtener el usuario de un carrito
select * from users where users.id = {$cart->user_id}
```

Cart (carts) -> CartItem (cart_items)

```sql
-- como obtener todos los items de un carrito
select * from cart_items where cart_items.cart_id = {$cart->id}

-- como obtener el carrito que pertenece a un item
select * from carts where carts.id = {$cart_item->cart_id}
```

### Relacion polimorfica

1. 1 a 1
Tenemos users, posts e images
    images
        - id
        - url
        - imageable_type -> App\\Models\\User o App\\Models\\Post
        - imageable_id   -> integer

```sql
insert into images (url, imageable_type, imageable_id) VALUES
(http://localhost:8000/user/1, 'App\\Models\\User', 1),
(http://localhost:8000/images/1, 'App\\Models\\User', 1)
```

    UserImages -> user_images -> user_id
    PostImages -> post_images -> post_id
     