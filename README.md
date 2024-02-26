<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Simple Restaurant Management System</h3>

  <p align="center">
<!--     Simple Restaurant Management System! -->
  
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>

  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project



The Restaurant Management System is a comprehensive web application designed and implemented using PHP with the Laravel framework. It serves as a simplified yet powerful tool for managing restaurant operations, focusing on menu and order management functionalities.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With



* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]





<!-- GETTING STARTED -->
## Getting Started

To set up the project locally, follow these simple steps:


### Prerequisites

Clone the Repository:

* Begin by cloning the project repository to your local machine. You can do this using Git by running the following command in your terminal:

```sh
git clone  https://github.com/M0o0hamedAhmed/Restaurant-Management-System.git
```

### Installation

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._

* composer install
 ```sh
composer install
```
* npm install 
```sh
npm install
```
* npm build
```sh
npm run build
```

* make database and put [db name,db user,db password] in .env file
  
* migrate tables with this command
```sh
php artisan migrate
```
* run seeder for create admin
```sh
php artisan db:seed
```

* run project by this command
```sh
php artisan serve
```

* go to url  Server running on like :
  ```sh
  http://127.0.0.1:8000
  ```
* This will redirect you to the login page where you can enter your email and password. This information is provided in the seeder.
* email
   ```sh
   admin@admin.com
   ```
* password
  ```sh
  admin
  ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

You have the ability to create users and categories. Each category can contain multiple menu items. Additionally, you can create menu items. Users can then place orders via the API. Furthermore, you can assign roles and permissions to users or staff members. In the control panel, you have the ability to manage orders. You can increase or decrease the quantity of items in an order, as well as add or remove menu items

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [x] CRUD User
- [x] CRUD Category
- [x] CRUD Order
- [x] CRUD Permissions
- [x] CRUD Role



<p align="right">(<a href="#readme-top">back to top</a>)</p>







<!-- CONTACT -->
## Contact

Your Name - [@your_twitter](https://twitter.com/M0ohamedAhmed) - mabolaumon@gmail.com

Project Link: [https://github.com/M0o0hamedAhmed/Restaurant-Management-System](https://github.com/M0o0hamedAhmed/Restaurant-Management-System)

<p align="right">(<a href="#readme-top">back to top</a>)</p>




<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/mohamed-ahmed-a91a20165/
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
[Select2-url]:https://select2.org/
