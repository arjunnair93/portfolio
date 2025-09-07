# Deployment Guide

## Frontend Deployment (Vercel - Recommended)

1. Visit [vercel.com](https://vercel.com)
2. Sign up with GitHub
3. Click "Import Project"
4. Select your `arjunnair93/portfolio` repository
5. Configure:
   - **Framework Preset**: Vue.js
   - **Root Directory**: `frontend`
   - **Build Command**: `npm run build`
   - **Output Directory**: `dist`
6. Click "Deploy"

Your site will be live at: `https://your-project-name.vercel.app`

## Full-Stack Deployment (Railway)

1. Visit [railway.app](https://railway.app)
2. Sign up with GitHub
3. Click "Deploy from GitHub repo"
4. Select your repository
5. Railway will auto-detect Docker Compose
6. Both frontend and backend will be deployed!

## Environment Variables

For production, you may need to set:
- `VITE_API_URL` for frontend
- Database credentials for backend

## Custom Domain

Both Vercel and Railway offer free custom domain support!
