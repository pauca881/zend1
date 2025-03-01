# zend1

# # Solucions zend
Introducir indicar que devolvia el mètodo : bool
Mostrar más errores ( modificar applicaction.ini a 1 en production )

Registri, modificar i afegir:

  public function offsetExists($index)
    {
        return parent::offsetExists($index);
    }

    original: return array_key_exists($index, $this);

añadir: error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);


Comandos:
zf create project miproyecto
cd miproyecto
zf create model Usuario
zf create controller Usuario index,add,edit,delete
zf create form Usuario
zf create view -c usuario -a index
zf create view -c usuario -a add
zf create view -c usuario -a edit
zf create view -c usuario -a delete

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

application/configs/application.ini:
resources.db.adapter = "PDO_MYSQL"
resources.db.params.host = "localhost"
resources.db.params.username = "usuario"
resources.db.params.password = "contraseña"
resources.db.params.dbname = "nombre_base_datos"
