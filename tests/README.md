# Tests

This directory contains the test suite for the SNL Typed.js package.

## Running Tests

To run the test suite:

```bash
composer test
```

Or directly with PHPUnit:

```bash
vendor/bin/phpunit
```

## Test Structure

- **Unit Tests** (`tests/Unit/`): Test individual components in isolation
  - `SnlTypeComponentTest.php`: Tests the SnlType Blade component class
  - `SnlTypeServiceProviderTest.php`: Tests the service provider registration

- **Feature Tests** (`tests/Feature/`): Test complete functionality
  - `ComponentRenderingTest.php`: Tests the component rendering with various configurations

## Test Coverage

The test suite includes:

- ✅ Component instantiation and defaults
- ✅ Custom ID handling
- ✅ String parameter handling (array/string conversion)
- ✅ Boolean configuration options
- ✅ Speed and delay configuration
- ✅ Styling options (font-size, color, cursor)
- ✅ Slot content vs strings attribute
- ✅ Complete component rendering
- ✅ Service provider registration
- ✅ View namespace loading
- ✅ Blade component registration

## Adding New Tests

When adding new features, make sure to add corresponding tests:

1. Unit tests for component logic in `tests/Unit/`
2. Feature tests for rendering behavior in `tests/Feature/`

Follow the existing test naming conventions:
- Test methods should start with `it_` followed by a descriptive name
- Use the `@test` annotation
