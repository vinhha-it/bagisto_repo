import { defineConfig, loadEnv } from "vite";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig(({ mode }) => {
    const envDir = "../../../";

    Object.assign(process.env, loadEnv(mode, envDir));

    return {
        build: {
            emptyOutDir: true,
        },

        envDir,

        server: {
            host: process.env.VITE_HOST || "localhost",
            port: process.env.VITE_PORT || 5173,
        },

        plugins: [
            vue(),

            laravel({
            //     hotFile: "../../../public/saas-default-vite.hot",
            //     publicDirectory: "../../../public",
            //     buildDirectory: "vendor/webkul/saas/build",
            //     input: [
            //         "src/Resources/assets/css/super-admin.css",
            //     ],
            //     refresh: true,
            // }, {
                hotFile: "../../../public/company-default-vite.hot",
                publicDirectory: "../../../public",
                buildDirectory: "vendor/webkul/company/build",
                input: [
                    "src/Resources/assets/css/app.css",
                ],
                refresh: true,
            }),
        ],

        experimental: {
            renderBuiltUrl(filename, { hostId, hostType, type }) {
                if (hostType === "css") {
                    console.log(filename);
                    return path.basename(filename);
                }
            },
        },
    };
});
