# WeConect Test Application

## Overview

This project is a take-home assessment designed to demonstrate my ability to develop and deploy a web application using the best coding and and deployment practices with Laravel, PHP, AWS (EC2,S3,RDS), and basic front-end using JavaScript and SASS. Although it was not a requirement, I chose to use Domain-Driven Design (DDD) and Hexagonal Architecture for the backend and Docker/Docker Compose for containerization. These choices ensure a clean, maintainable, and testable codebase, while also making the application easy to deploy and scale. The backend is hosted on AWS, while the frontend is hosted on Cloudflare Pages.

The backend code is located in the weconect-back directory, and the frontend code is in the weconect-front directory. Most of the PHP code is found in the weconect-back/src directory, with the code for the Articles API in the Content directory and the code for the Fibonacci logic in the Fibonacci directory.

Github repository for the code: [https://github.com/oniltos/test-weconect](https://github.com/oniltos/test-weconect)


## Table of Contents

- [Overview](#overview)
- [Requirements](#requirements)
- [Architecture](#architecture)
- [Technologies Used](#technologies-used)
- [Backend Setup](#backend-setup)
  - [Domain-Driven Design (DDD) and Hexagonal Architecture](#domain-driven-design-ddd-and-hexagonal-architecture)
  - [Deployment on AWS](#deployment-on-aws)
  - [API Endpoints](#api-endpoints)
- [Frontend Setup](#frontend-setup)
  - [Simple HTML, SCSS, and JavaScript](#simple-html-scss-and-javascript)
  - [Deployment on Cloudflare Pages](#deployment-on-cloudflare-pages)
- [Benefits of DDD/Hexagonal Architecture](#benefits-of-dddhexagonal-architecture)
- [Running the Fibonacci Code](#running-the-fibonacci-code)
- [Contact](#contact)

## Requirements

- **Backend**: Laravel (PHP framework)
- **Frontend**: HTML, SCSS, and JavaScript
- **Database**: MySQL RDS
- **Hosting**:
  - Backend: AWS EC2
  - Files: AWS S3

## Architecture

### Domain-Driven Design (DDD) and Hexagonal Architecture with Laravel

The backend is built using DDD and Hexagonal Architecture to separate the core business logic from external concerns like database access and web frameworks. This approach ensures a clean, maintainable, and testable codebase.

### Simple HTML, SCSS, and JavaScript

The frontend is implemented using a straightforward approach with HTML, SCSS, and JavaScript to create a responsive and interactive user interface.

## Technologies Used

### Backend

- **PHP**: Core programming language
- **Laravel**: PHP framework used for its simplicity and robustness
- **RDS**: Relational database management system
- **Docker**: Containerization platform
- **Nginx**: Web server

### Frontend

- **HTML**: Markup language for structuring web content
- **SCSS**: CSS preprocessor for better styling
- **JavaScript**: Scripting language for interactivity

### Hosting

- **AWS EC2**: Hosting platform for the backend
- **Cloudflare Pages**: Hosting platform for the frontend

## Backend Setup

### Domain-Driven Design (DDD) and Hexagonal Architecture

The backend is organized into three main layers:

1. **Domain Layer**: Contains the core business logic and domain entities.
2. **Application Layer**: Manages the application logic and acts as a bridge between the domain and infrastructure layers.
3. **Infrastructure Layer**: Handles the technical details, such as database access and external APIs.

### Deployment on AWS

The backend is deployed on AWS EC2 using Docker and Nginx. All the Cloudformation .yaml files needed to create the infraestructure on AWS could be found at the /weconect-back/cloudformation directory. Here is the setup process:

1. **Create an EC2 Instance**: Using Ubuntu 18.04 AMI.
2. **Install Docker and Docker Compose**: To manage the application containers.
3. **Clone the Repository**: From GitHub using a personal access token.
4. **Set Up Environment Variables**: Configure the `.env` file with database and S3 credentials.
5. **Run Docker Compose**: To start the application containers.

The API is accessible at: [https://weconect-test-api.niltonfreitas.com/api/articles](https://weconect-test-api.niltonfreitas.com/api/articles)

### API Endpoints

- **GET /api/articles**: Retrieve a list of articles.

## Frontend Setup

### Simple HTML, SCSS, and JavaScript

The frontend is a simple static site created with:

- **HTML**: For the structure.
- **SCSS**: For styling.
- **JavaScript**: For interactivity.

### Deployment on Cloudflare Pages

The frontend is deployed on Cloudflare Pages, which provides fast and secure hosting for static sites.

The frontend is accessible at: [https://weconect-test-front.niltonfreitas.com/](https://weconect-test-front.niltonfreitas.com/)

## Benefits of DDD/Hexagonal Architecture

### Maintainability

- **Separation of Concerns**: Clearly separates the domain logic from the application and infrastructure layers, making the codebase easier to understand and maintain.
- **Modularity**: Each layer can be developed, tested, and maintained independently.

### Testability

- **Isolated Testing**: Business logic can be tested independently of external systems, such as databases or web frameworks.
- **Mocking and Stubbing**: External dependencies can be easily mocked or stubbed in tests, leading to faster and more reliable tests.

### Flexibility

- **Framework Agnostic**: The core domain logic is not tied to any specific framework, making it easier to switch frameworks or update technologies.
- **Easily Extensible**: New features and services can be added with minimal impact on existing code.

### Refactorability

- **Encapsulation**: Core business logic is encapsulated within the domain layer, making it easier to refactor without affecting other parts of the system.
- **Decoupling**: Decoupling the application from infrastructure concerns allows for easier changes to the underlying infrastructure.

## Running the Fibonacci Code

The Fibonacci code is part of the application to demonstrate computational logic. You can run the Fibonacci function as a Laravel console command.

### Running the Fibonacci Code as a Laravel Console Command
```php
php artisan generate:fibonacci {n : The number of Fibonacci sequence terms to generate}
```

## Contact

For any questions or further information, please contact:

- **Name**: Nilton Freitas
- **Email**: [hello@niltonfreitas.com](mailto:hello@niltonfreitas.com)
