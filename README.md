# TP4 – Proyecto PHP y MySQL: InfoAutos 🚗💻
---

## 📖 Descripción

Sistema PHP que interactúa con la base de datos **`infoautos`**, compuesta por las tablas:

- **`persona`**: Dueños de autos.  
- **`auto`**: Autos, cada uno asociado a un único dueño.  

Se implementa el patrón **Modelo – Control – Vista (MVC)**:

- **Modelo:** clases que representan los datos (`BaseDatos.php` y las tablas `persona` y `auto`).  
- **Control:** clases que manejan la lógica y acceden al modelo (`AutoControl.php` y `PersonaControl.php`).  
- **Vista:** páginas PHP y HTML que muestran la información al usuario, con **Bootstrap** y validaciones **JavaScript**.  

---

## 📂 Estructura del proyecto

- **`BaseDatos.php`** – Conexión a la base de datos  
- **Control/** – Clases de control:
  - `AutoControl.php` – Control de autos  
  - `PersonaControl.php` – Control de personas  


---

## ⚙️ Tecnologías utilizadas

- **PHP**  
- **MySQL**  
- **HTML / Bootstrap 5 / JavaScript**  
- **Git / GitHub**  

---

## 🚀 Cómo ejecutar

1. Copiar el proyecto a `htdocs` de XAMPP:  