# XP-Retro-Games: Classic Gaming Web Platform

## Executive Summary

This project features the development of a dynamic, retro-themed web application dedicated to classic video games. Unlike strictly static environments, this platform integrates a client-server architecture, utilizing **PHP** for server-side processing alongside modern front-end technologies to deliver an interactive and robust user experience.

The software architecture was designed with a focus on **Modularity and Separation of Concerns (SoC)**, organizing assets, views, and server logic into distinct environments to ensure maintainability and scalability for future feature expansions.

## Technical Stack

* **Front-End Rendering:** HTML5 & CSS3 (Semantic structure and retro-themed visual formatting).
* **Client-Side Logic:** JavaScript ES6+ (DOM manipulation and asynchronous UI events).
* **Server-Side Processing:** PHP (Dynamic content generation and backend request handling).
* **Environment:** Apache/Local Web Server (e.g., XAMPP/MAMP for PHP parsing).

---

## System Architecture & Logic

The platform operates via a hybrid execution flow, bridging client interactions with server-side responses:

1. **Server-Side Rendering (SSR) Module:** PHP scripts handle data requests and dynamically assemble HTML views before transmitting them to the client, reducing client-side load.
2. **Component Architecture:** Reusable UI elements are isolated within the `components` directory, allowing PHP or JavaScript to inject them into various `pages` consistently.
3. **Asset Management Pipeline:** All static files (images, stylesheets) are served through a dedicated `public` or `src` directory, optimizing resource fetching and load times.

---

## Client-Server Interaction Matrix

To ensure deterministic behavior across the platform, the following interaction logic was implemented:

| Detected Event | Execution Layer | System Action |
| :--- | :--- | :--- |
| **Page Navigation Request** | Server (PHP) | Parses requested route and serves the assembled view |
| **Form/Data Submission** | Server (PHP) | Processes input data and returns validation/state status |
| **UI Element Hover/Click** | Client (CSS/JS) | Triggers immediate visual feedback (retro animations) |

---

## File Architecture (Directory Mapping)

| Component | Path | Function |
| :--- | :--- | :--- |
| **Modules / Partials** | `components/` | Reusable structural blocks (headers, footers, game cards) |
| **Application Views** | `pages/` | Specific route templates and detailed user interfaces |
| **Static Assets** | `public/` | Client-accessible media (images, icons) and external resources |
| **Source Logic** | `src/` | Core scripts, stylesheets, and foundational logic files |

---

## How to Run

*Note: Because this project utilizes PHP, it cannot be run simply by opening the HTML files in a browser. A local server environment is required.*

1. Install a local web server stack such as **XAMPP**, **MAMP**, or **Laragon**.
2. Clone this repository inside your server's root directory (e.g., `htdocs` for XAMPP):
   ```bash
   git clone [https://github.com/HJLeslye/XP-Retro-Games.git](https://github.com/HJLeslye/XP-Retro-Games.git)
