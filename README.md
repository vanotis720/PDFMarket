<p align="center"><h1 align="center">PDFMarket - Sell & Buy PDF from your favorite creators</h1></p>
<p align="center"><h3 align="center">A simple and powerful platform for selling and buying PDF files using Lygos API for mobile money payment (Youtube tuto)</h3></p>

## About PDFMarket

PDFMarket is a marketplace platform built with Laravel that connects PDF creators with buyers. The platform leverages the Lygos API to provide seamless mobile money payment processing in Africa, making it easy for creators to monetize their content and for customers to purchase digital products.

### Key Features

- **Creator Dashboard**: Upload, manage, and track sales of your PDF products
- **Secure Digital Delivery**: Instant delivery of purchased PDFs to buyers
- **Mobile Money Integration**: Simple checkout process using Lygos mobile money payments
- **User Reviews**: Build reputation through customer feedback
- **Analytics**: Track your best-selling content and customer demographics
- **Category Management**: Organize PDFs by topics for easy discovery
- **Responsive Design**: Seamless experience on any device

## Getting Started

### Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL database
- Lygos API credentials

### Installation

1. Clone the repository
   ```
   git clone https://github.com/vanotis720/PDFMarket.git
   ```

2. Navigate to the project directory
   ```
   cd PDFMarket
   ```

3. Install dependencies
   ```
   composer install
   ```
    ```
    npm install
    ```

4. Set up environment variables
   ```
   cp .env.example .env
   ```

5. Configure your Lygos API credentials in the `.env` file
   ```
   LYGOS_API_KEY=your_api_key
   LYGOS_SECRET=your_api_secret
   ```

6. Configure your database settings in the `.env` file

7. Run migrations and seed the database
   ```
   php artisan migrate --seed
   ```
   ```
   npm install
   npm run dev
   ```

8. Start the development server

   ```
   php artisan serve
   ```

## For Creators

Creating an account and selling your PDFs on PDFMarket is simple:

1. Register for a creator account
2. Set up your payment information with Lygos
3. Upload your PDF files with descriptions and pricing
4. Share your PDFMarket profile with your audience
5. Get paid automatically when customers purchase your content

## For Buyers

Purchasing PDFs is quick and secure:

1. Browse the marketplace or search for specific content
2. Preview available PDFs
3. Purchase using mobile money via Lygos
4. Access your purchased PDFs immediately in your account

## Built With

- [Laravel](https://laravel.com) - The PHP framework for web artisans
- [Lygos API](https://www.lygosapp.com) - Mobile money payment processing for Africa
- [Bootstrap](https://getbootstrap.com) - Responsive front-end toolkit

## Contributing

Interested in contributing to PDFMarket? We welcome contributions from the community. Please read our contribution guidelines before submitting a pull request.

## Security

If you discover any security issues within PDFMarket, please contact our team via [vanotis720@gmail.com](mailto:vanotis720@gmail.com) instead of using the issue tracker.

## License

PDFMarket is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).# PDFMarket
