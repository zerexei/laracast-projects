import { test, expect } from '@playwright/test';

test.use({
    colorScheme: 'dark' // or 'light'
});

// test.beforeEach(async ({ page }) => {
//     await page.goto('/');
// });


test('Should load welcome page', async ({ page }) => {
    await page.goto('/');
    await expect(page).toHaveScreenshot();
});

test('Should load App page', async ({ page }) => {
    page.goto('/dashboard');
    await expect(page).toHaveScreenshot();
});
