<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate(); // Clear the table before seeding

        $projects = [
            [
                'name' => 'Easededge: Stone Purchasing Software',
                'description' => 'Developed a comprehensive stone purchasing application with advanced drawing tools, an automated billing system, and QuickBooks integration via REST API.',
                'image' => 'project1.jpg'
            ],
            [
                'name' => 'Easededge: Inventory Management System',
                'description' => 'Built a robust inventory system using a Python Django backend and a React.js frontend, deployed on a scalable AWS multi-tier architecture with Docker.',
                'image' => 'project2.jpg'
            ],
            [
                'name' => 'Timber Company Ecommerce Website',
                'description' => 'Led bug fixing and feature enhancement for an e-commerce site using Laravel and Vue.js, focusing on database optimization and REST API development.',
                'image' => 'project3.jpg'
            ],
            [
                'name' => 'TLC (Traffic Light Controller Application)',
                'description' => 'Created a traffic light management solution using Python (PyQt), OpenCV for vehicle detection, and TensorFlow for machine learning algorithms.',
                'image' => 'project1.jpg'
            ],
            [
                'name' => 'VRU (Vulnerable Road User Detection)',
                'description' => 'Engineered a real-time system to detect vulnerable road users using Python, OpenCV, and TensorFlow for multi-object detection models.',
                'image' => 'project2.jpg'
            ],
            [
                'name' => 'Headless E-Commerce with Magento',
                'description' => 'Developed a headless e-commerce architecture using PHP and Magento, implementing REST API services for frontend-backend communication.',
                'image' => 'project3.jpg'
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}