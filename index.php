<?php
	$app = require(__DIR__.'/../app.php');
	
	// Collect and Queue Ingestion Requests
	$app->post('/ingest/{ingestionType}', 'Pulse\\IngestionQueueController::queueIngestion');
	
	// Helpscout Sidebar API
	$app->post('/api/helpscout', 'Pulse\\HelpscoutSidebarController::helpscoutSidebarApi');
	
	$app->run();
?>