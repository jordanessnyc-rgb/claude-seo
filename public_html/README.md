# Gas Pro Inspectors Website

Modern responsive marketing site with a custom lead capture backend.

## Run locally

1. Install dependencies:

```bash
npm install
```

2. Create environment file:

```bash
cp .env.example .env
```

3. Fill in SMTP credentials in `.env`.

4. Start server:

```bash
npm run dev
```

Open [http://localhost:3000](http://localhost:3000).

## Lead API

- Endpoint: `POST /api/leads`
- Anti-spam: honeypot, timestamp gate, in-memory rate limit
- Email: sent via SMTP using Nodemailer
- CRM: optional webhook forwarding via `CRM_WEBHOOK_URL`
