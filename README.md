<!-- GitAds-Verify: S5QPDQZ3NU3OMU3GWOWSM4WKDG9T8MKT -->
# SNL Typed.js - Laravel Typing Animation Component

A Laravel Blade component package for creating beautiful typing animations using the Typed.js library.

## Features

- 🎨 Easy-to-use Blade component syntax
- ⚡ Lightweight and performant
- 🎯 Full Typed.js configuration support
- 🔧 Customizable styling and behavior
- 📦 Auto-discovery for Laravel
- ♻️ Optimized with reusable initialization function (loaded once via @once directive)

#### ads
[![Sponsored by GitAds](https://gitads.dev/v1/ad-serve?source=sticknologic/snl-typed-js@github)](https://gitads.dev/v1/ad-track?source=sticknologic/snl-typed-js@github)


## Requirements

- PHP 8.1 or higher
- Laravel 10.x, 11.x, or 12.x

## Installation

Install the package via Composer:

```bash
composer require sticknologic/snl-typed-js
```

The package will be automatically discovered by Laravel.

## Usage

### Basic Example

**Using the `:strings` attribute:**

```blade
<x-snl-type :strings="['Hello World!', 'Welcome to Laravel!', 'Enjoy typing animations!']" />
```

**Using slot content (inner child):**

```blade
<x-snl-type>
    <p>Hello World!</p>
    <p>Welcome to Laravel!</p>
    <p>Enjoy typing animations!</p>
</x-snl-type>
```

### Advanced Example

**With `:strings` attribute:**

```blade
<x-snl-type 
    :strings="['First string', 'Second string', 'Third string']"
    :type-speed="50"
    :back-speed="30"
    :back-delay="1000"
    :start-delay="500"
    :loop="true"
    :shuffle="false"
    :show-cursor="true"
    :smart-backspace="true"
    font-size="2rem"
    color="#3490dc"
    cursor="_"
    class="text-center my-4"
/>
```

**With slot content:**

```blade
<x-snl-type 
    :type-speed="50"
    :back-speed="30"
    :back-delay="1000"
    :start-delay="500"
    :loop="true"
    :shuffle="false"
    :show-cursor="true"
    :smart-backspace="true"
    font-size="2rem"
    color="#3490dc"
    cursor="_"
>
    <p>First string</p>
    <p>Second string</p>
    <p>Third string</p>
</x-snl-type>
```

## Available Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `id` | string | auto-generated | Unique identifier for the element |
| `strings` | array/string | `[]` | Array of strings to type |
| `type-speed` | int | `60` | Type speed in milliseconds |
| `start-delay` | int | `0` | Delay before typing starts (ms) |
| `back-speed` | int | `60` | Backspacing speed in milliseconds |
| `back-delay` | int | `700` | Delay before backspacing (ms) |
| `smart-backspace` | bool | `true` | Only backspace what doesn't match |
| `shuffle` | bool | `false` | Shuffle the strings |
| `loop` | bool | `true` | Loop the animation |
| `show-cursor` | bool | `true` | Show blinking cursor |
| `cursor` | string | `\|` | Custom cursor character |
| `font-size` | string | `1rem` | CSS font-size value |
| `color` | string | `inherit` | CSS color value |
| `class` | string | `null` | CSS class names for the container div |

## Publishing Views

If you need to customize the component views, you can publish them:

```bash
php artisan vendor:publish --tag=snl-type-views
```

The views will be published to `resources/views/vendor/snl-type`.

## Examples

### Multiple Instances

You can use multiple typing animations on the same page:

```blade
<div class="hero">
    <h1>I am a 
        <x-snl-type 
            :strings="['Developer', 'Designer', 'Creator']"
            :loop="true"
            color="#e3342f"
        />
    </h1>
</div>

<div class="tagline">
    <x-snl-type 
        :strings="['Building amazing things...', 'One line of code at a time.']"
        :loop="false"
        :type-speed="40"
    />
</div>
```

### Using Slot Content (Inner Child)

The slot content approach is useful when you want to include HTML or dynamic content.

**Important Notes:**
- Each text string must be wrapped in a block element (`<p>`, `<div>`, `<h1>`, etc.)
- Text NOT enclosed in an element will **not be rendered**
- Elements like `<h1>`, `<h2>`, etc. will render as **normal text**, not as headers
- Use `<span>` inside the elements to style specific parts of the text

**Example showing all cases:**

```blade
<x-snl-type :loop="true">
    <p>First string - renders normally</p>
    <h1>This will be normal text, NOT a header</h1>
    <p>Text with <span style="color: red;">red color</span> styling</p>
    This text will NOT render because it's not enclosed in an element
    <div>You can also use div elements</div>
</x-snl-type>
```

**Result:** The typing animation will display:
1. "First string - renders normally"
2. "This will be normal text, NOT a header" (as plain text)
3. "Text with red color styling" (with "red color" in red)
4. "You can also use div elements"

The standalone text will be ignored completely.

**Styling example:**

```blade
<x-snl-type :loop="true">
    <p>Welcome to <strong>Laravel</strong></p>
    <p>Build <em>amazing</em> applications</p>
    <p>With <span style="color: red;">SNL Typed.js</span></p>
</x-snl-type>
```

### Dynamic Content Example

```blade
<x-snl-type :type-speed="40" :loop="true">
    @foreach($features as $feature)
        <p>{{ $feature }}</p>
    @endforeach
</x-snl-type>
```

### Custom Styling

```blade
<div style="text-align: center; padding: 2rem;">
    <x-snl-type 
        :strings="['Welcome!', 'Explore our features', 'Get started today']"
        font-size="3rem"
        color="linear-gradient(to right, #667eea 0%, #764ba2 100%)"
        :show-cursor="false"
    />
</div>
```

## License

This package is open-sourced software licensed under the [GPL-3.0 license](LICENSE).

## Credits

- Built with [Typed.js](https://github.com/mattboldt/typed.js/)
- Maintained by [SticknoLogic](https://sticknologic.is-a.dev)

## Technical Details

### Optimization

The component uses a reusable `initSnlTyped()` function defined in the `@once` directive. This means:
- The function is loaded only once per page, regardless of how many typing animations you use
- Each component instance simply calls the function with its specific configuration
- Reduces code duplication and improves page load performance

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/sticknologic/snl-typed-js).
