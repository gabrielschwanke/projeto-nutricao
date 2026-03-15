#  Nutrition Calculator --- Macronutrients & Dietary Tips

A complete system developed using **PHP + MySQL** to calculate the
ideal amount of **macronutrients** (proteins, carbohydrates, and fats)
according to the user's goal: **lose weight, maintain weight, or gain muscle mass**.

In addition, the system provides **personalized guidance**, performance
charts, modern animations, and informational pages to assist the user
throughout their nutritional progress.

---

## 🚀 Main Features

* 🔐 **Authentication**

  * Login, registration, logout, and route protection.

* ⚖️ **Personalized nutritional calculation**

  * Uses data such as age, weight, height, gender, and goal.
  * Calculates daily calorie needs.
  * Generates macronutrient distribution (carbohydrates, proteins, and fats).
  * Displays a detailed table for each goal.

* 📊 **Performance page**

  * Charts showing user progress and records.
  * Dynamic visualization using Chart.js.

* 🧭 **Informational pages**

  * About\
  * Features\
  * Contact\
  * Support\
  * Plans

* **Modern interface**

  * Fully responsive
  * Animated components
  * Custom fields and refined UI

---

## 🛠️ Technologies Used

* **PHP 7+**
* **MySQL**
* **HTML5 / CSS3**
* **JavaScript**
* **Chart.js**
* **Custom CSS Animations**

---

## 📷 Screenshots

### Login Screen

![Login Screen](img/imagens/login.png)

### Dashboard

![Dashboard](img/imagens/dashboard.png)

### Macronutrient Calculation

![Calculation](img/imagens/calculo.png)

### Performance Page

![Performance](img/imagens/desempenho.png)

---

##  How to Install and Run Locally (XAMPP)

### 🔧 Prerequisites

* XAMPP installed (Apache + MySQL)\
* Updated browser\
* Git (optional)

---

### **1️⃣ Clone the repository**

```bash
git clone https://github.com/gabrielschwanke/projeto-nutricao.git
```

Or download the ZIP from GitHub.

---

### **2️⃣ Move to the local server directory**

#### Windows:

```
C:\xampp\htdocs\calculadora-nutricional
```

#### macOS / Linux:

```
/opt/lampp/htdocs/calculadora-nutricional
```

---

### **3️⃣ Start the server**

Open the XAMPP control panel and activate:

✔ Apache
✔ MySQL

---

### **4️⃣ Create the database**

1. Access: http://localhost/phpmyadmin\

2. Click **New**\

3. Create a database named:

   dieta_db

4. Go to **Import**\

5. Select the file:

   database.sql

6. Click **Execute**

---

### **5️⃣ Database configuration**

The `conexao.php` file is already configured for the local environment (XAMPP).

Just make sure the created database has the same name defined in the file (`dieta_db`).

---

### **6️⃣ Access the system**

Open in your browser:

```
http://localhost/calculadora-nutricional/
```

---

## 📁 Project Structure

calculadora-nutricional
│
├── css/              # System styles
├── img/              # Images and assets
│   └── imagens/      # Screenshots used in the README
├── conexao.php       # Database connection
├── login.php         # Authentication page
├── dashboard.php     # User dashboard
├── desempenho.php    # Charts page
├── processa.php      # Calculation processing
└── database.sql      # Database structure

---

## 🌐 Live Demo

🔗 **Access the system online:**

https://formulafit.infinityfree.me

---

## 👨‍💻 Author

Gabriel Pereira Schwanke

Student of Systems Analysis and Development.

Academic project developed as a full-stack web application using PHP, MySQL, and JavaScript.
