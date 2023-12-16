import { NextResponse } from 'next/server'

export function middleware(request) {
  return NextResponse.redirect(new URL('/auth/sign-in', request.url))
}

export const config = {
  matcher: '/admin/:path*',
}