# Guide d'Installation

Suivez ces étapes pour cloner et configurer le projet **Gestion_ecole** Laravel sur votre machine locale.

## Prérequis

- PHP 8.2 ou supérieur
- Composer
- Serveur de base de données MySQL

## Cloner le Dépôt

1. **Ouvrez votre terminal ou invite de commande.**

2. **Naviguez vers le répertoire où vous souhaitez stocker le projet :**

   ```bash
   cd chemin/vers/votre/répertoire
   ```

3. **Clonez le projet Laravel depuis GitHub :**

   ```bash
   git clone https://github.com/YannLysias/Gestion_ecole.git
   ```

4. **Naviguez dans le répertoire du projet cloné :**

   ```bash
   cd Gestion_ecole
   ```

## Installation des Dépendances de l'API

1. **Naviguez dans le répertoire de l'API :**

   ```bash
   cd api
   ```

2. **Installez les dépendances du projet avec Composer :**

   ```bash
   composer install
   ```

3. **Installez les dépendances de Vite :**

   ```bash
   npm install
   ```

4. **Construisez les assets avec Vite :**

   ```bash
   npm run build
   ```

## Configuration de l'Environnement

Copiez le fichier `.env.example` en `.env` dans le dossier racine :

Pour Windows (invite de commande) :

```bash
copy .env.example .env
```

Pour macOS/Linux (terminal) :

```bash
cp .env.example .env
```

Ouvrez votre fichier `.env` et mettez à jour les paramètres de configuration de la base de données (`DB_DATABASE`, `DB_USERNAME` et `DB_PASSWORD`) pour correspondre à votre configuration locale.

## Configuration de l'Application

Générez une clé d'application :

```bash
php artisan key:generate
```

Exécutez les migrations de base de données :

```bash
php artisan migrate
```

## Lancer le Serveur de Développement

Démarrez le serveur de développement :

```bash
php artisan serve
```

Visitez [http://localhost:8000](http://localhost:8000) dans votre navigateur pour accéder à votre application Laravel.

## Installation et Configuration du Dashboard

1. **Naviguez dans le répertoire du dashboard React :**

   ```bash
   cd ../dashboard
   ```

2. **Installez les dépendances du projet avec npm :**

   ```bash
   npm install
   ```

## Lancer le Serveur de Développement du Dashboard

Démarrez le serveur de développement :

```bash
npm start
```

Visitez [http://localhost:3000](http://localhost:3000) dans votre navigateur pour accéder à votre dashboard React.

## Dépannage

- Si vous rencontrez des problèmes de connexion à la base de données, assurez-vous que votre serveur de base de données est en cours d'exécution et que les identifiants dans votre fichier `.env` sont corrects.
- Pour les problèmes avec Composer, essayez d'exécuter `composer update` ou consultez la documentation de Composer.
- Pour les problèmes avec npm, essayez d'exécuter `npm update` ou consultez la documentation de npm.

## Contribuer

Si vous souhaitez contribuer au projet, veuillez suivre les directives de contribution.

## Licence

Ce projet est sous licence MIT.