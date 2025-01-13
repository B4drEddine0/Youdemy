# Youdemy - Plateforme de Cours en Ligne

## 📝 Description
Youdemy est une plateforme de cours en ligne interactive et personnalisée, conçue pour offrir une expérience d'apprentissage optimale aux étudiants et aux enseignants.

## 🚀 Fonctionnalités

### 🏠 Front Office

#### 👥 Visiteur
- Consultation du catalogue des cours avec pagination
- Recherche de cours par mots-clés
- Création de compte (Étudiant/Enseignant)

#### 👨‍🎓 Étudiant
- Accès au catalogue complet des cours
- Recherche avancée et consultation détaillée des cours
- Inscription aux cours
- Espace personnel "Mes cours"

#### 👨‍🏫 Enseignant
- Création et gestion de cours
  - Ajout de contenu (vidéo/document)
  - Gestion des métadonnées (tags, catégories)
- Tableau de bord avec statistiques
  - Suivi des inscriptions
  - Analyses des performances

### ⚙️ Back Office

#### 👨‍💼 Administrateur
- Gestion des comptes enseignants
- Administration des utilisateurs
  - Activation/Suspension/Suppression
- Gestion du contenu
  - Modération des cours
  - Gestion des catégories et tags
  - Import en masse de tags
- Statistiques globales
  - Métriques générales
  - Top 3 des enseignants
  - Cours les plus populaires

## 🛠 Spécifications Techniques

### Architecture
- Programmation Orientée Objet (POO)
  - Encapsulation
  - Héritage
  - Polymorphisme
- Base de données relationnelle
  - Relations One-to-Many
  - Relations Many-to-Many
- Gestion des sessions PHP
- Système de validation des données

### Sécurité
- Authentification robuste
- Autorisation basée sur les rôles
- Protection des routes sensibles
- Validation des entrées utilisateur

### Relations Base de Données
- Cours ↔ Tags (Many-to-Many)
- Utilisateurs ↔ Cours
- Catégories ↔ Cours

## 🔒 Contrôle d'Accès
Chaque rôle (Visiteur, Étudiant, Enseignant, Administrateur) dispose d'un accès strictement limité aux fonctionnalités correspondant à ses prérogatives.

## 🎯 Polymorphisme
Implémentation du polymorphisme pour :
- L'ajout de cours
- L'affichage des cours

## 📋 Prérequis
- PHP 7.4+
- MySQL 5.7+
- Serveur Web (Apache) 