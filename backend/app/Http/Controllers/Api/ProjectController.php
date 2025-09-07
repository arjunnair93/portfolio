<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index(): JsonResponse
    {
        $projects = Project::all()->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->name, // Map name to title for frontend compatibility
                'description' => $project->description,
                'technologies' => $this->extractTechnologies($project->description), // Extract from description
                'image_url' => $project->image,
                'github_url' => null, // Can be added later
                'demo_url' => null, // Can be added later
                'created_at' => $project->created_at->toISOString(),
                'updated_at' => $project->updated_at->toISOString(),
            ];
        });

        return response()->json($projects);
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project): JsonResponse
    {
        return response()->json([
            'id' => $project->id,
            'title' => $project->name,
            'description' => $project->description,
            'technologies' => $this->extractTechnologies($project->description),
            'image_url' => $project->image,
            'github_url' => null,
            'demo_url' => null,
            'created_at' => $project->created_at->toISOString(),
            'updated_at' => $project->updated_at->toISOString(),
        ]);
    }

    /**
     * Extract technologies from description
     */
    private function extractTechnologies(string $description): string
    {
        // Extract common technologies from description
        $technologies = [];
        $techKeywords = [
            'Python', 'Django', 'React', 'Laravel', 'Vue.js', 'PHP', 'JavaScript',
            'AWS', 'Docker', 'PyQt', 'OpenCV', 'TensorFlow', 'REST API',
            'Magento', 'QuickBooks', 'MySQL', 'PostgreSQL'
        ];

        foreach ($techKeywords as $tech) {
            if (stripos($description, $tech) !== false) {
                $technologies[] = $tech;
            }
        }

        return implode(', ', array_unique($technologies));
    }
}