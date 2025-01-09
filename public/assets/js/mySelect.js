class SearchableSelect {
    constructor(config = {}) {
        this.config = {
            selectId: '', // Required
            url: null,
            method: 'GET',
            csrfToken: null,
            placeholderText: 'Search...',
            noResultsText: 'No results found',
            loadingText: 'Loading...',
            errorText: 'Error loading data. Please try again.',
            renderOption: null, // Custom render function for options
            ...config
        };

        this.init();
    }

    init() {
        this.select = document.getElementById(this.config.selectId);
        if (!this.select) {
            console.error(`Select element with id "${this.config.selectId}" not found`);
            return;
        }

        this.container = this.select.parentElement;
        this.container.style.position = 'relative';
        this.allOptions = [];
        this.setupDropdown();
        this.attachEventListeners();
        this.loadOptions();
    }

    setupDropdown() {
        // Create dropdown structure
        this.customDropdown = document.createElement('div');
        this.customDropdown.className = 'custom-dropdown';

        // Create search box
        this.searchBox = document.createElement('div');
        this.searchBox.className = 'search-box';
        this.searchBox.innerHTML = `
            <input type="text" class="form-control dropdown-search" placeholder="${this.config.placeholderText}">
        `;

        // Create options container
        this.optionsContainer = document.createElement('div');
        this.optionsContainer.className = 'options-container';

        // Create loading indicator
        this.loadingIndicator = document.createElement('div');
        this.loadingIndicator.className = 'loading-indicator';
        this.loadingIndicator.textContent = this.config.loadingText;
        this.loadingIndicator.style.display = 'none';

        // Assemble dropdown
        this.customDropdown.appendChild(this.searchBox);
        this.customDropdown.appendChild(this.optionsContainer);
        this.container.appendChild(this.customDropdown);
        this.optionsContainer.appendChild(this.loadingIndicator);

        this.addStyles();
    }

    async loadOptions() {
        this.loadingIndicator.style.display = 'block';
        this.optionsContainer.innerHTML = '';
        this.optionsContainer.appendChild(this.loadingIndicator);

        try {
            if (this.config.url) {
                // Fetch from URL
                const fetchOptions = {
                    method: this.config.method,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                };

                if (this.config.csrfToken) {
                    fetchOptions.headers['X-CSRF-TOKEN'] = this.config.csrfToken;
                }

                const response = await fetch(this.config.url, fetchOptions);
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                const data = await response.json();
                this.allOptions = Array.isArray(data.data) ? data.data : data;
            } else {
                // Use existing select options
                this.allOptions = Array.from(this.select.options)
                    .filter(option => option.value) // Skip empty value options
                    .map(option => ({
                        id: option.value,
                        name: option.text,
                        ...option.dataset // Include any data attributes
                    }));
            }

            this.updateSelectOptions();
            this.renderDropdownOptions(this.allOptions);
        } catch (error) {
            console.error('Error loading options:', error);
            this.showError();
        }
    }

    updateSelectOptions() {
        // Keep the first option (placeholder) if it exists
        const firstOption = this.select.querySelector('option[value=""]');
        this.select.innerHTML = '';
        if (firstOption) this.select.appendChild(firstOption);

        this.allOptions.forEach(option => {
            const optElement = document.createElement('option');
            optElement.value = option.id;
            optElement.textContent = option.name;
            this.select.appendChild(optElement);
        });
    }

    renderDropdownOptions(options) {
        this.loadingIndicator.style.display = 'none';
        this.optionsContainer.innerHTML = '';

        if (options.length === 0) {
            const noResults = document.createElement('div');
            noResults.className = 'option-item';
            noResults.textContent = this.config.noResultsText;
            this.optionsContainer.appendChild(noResults);
            return;
        }

        options.forEach(option => {
            const optionElement = document.createElement('div');
            optionElement.className = 'option-item';
            
            if (this.config.renderOption) {
                // Use custom render function if provided
                optionElement.innerHTML = this.config.renderOption(option);
            } else {
                optionElement.textContent = option.name;
            }

            optionElement.dataset.value = option.id;
            if (option.id.toString() === this.select.value) {
                optionElement.classList.add('selected');
            }

            optionElement.onclick = () => {
                this.select.value = option.id;
                this.customDropdown.style.display = 'none';
                this.select.dispatchEvent(new Event('change'));
            };

            this.optionsContainer.appendChild(optionElement);
        });
    }

    showError() {
        this.loadingIndicator.style.display = 'none';
        this.optionsContainer.innerHTML = `
            <div class="option-item text-danger">
                ${this.config.errorText}
            </div>
        `;
    }

    // Event listeners and other helper methods...
    attachEventListeners() {
        this.select.addEventListener('click', (e) => {
            e.preventDefault();
            this.toggleDropdown();
        });

        let searchTimeout;
        this.searchBox.querySelector('input').addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                this.filterOptions(e.target.value.trim());
            }, 300);
        });

        document.addEventListener('click', (e) => {
            if (!this.container.contains(e.target)) {
                this.customDropdown.style.display = 'none';
            }
        });

        this.select.addEventListener('mousedown', (e) => {
            e.preventDefault();
        });
    }

    toggleDropdown() {
        const isVisible = this.customDropdown.style.display === 'block';
        this.customDropdown.style.display = isVisible ? 'none' : 'block';
        if (!isVisible) {
            this.searchBox.querySelector('input').focus();
            this.renderDropdownOptions(this.allOptions);
        }
    }

    filterOptions(searchTerm) {
        if (!searchTerm) {
            this.renderDropdownOptions(this.allOptions);
            return;
        }

        const filtered = this.allOptions.filter(option => 
            option.name.toLowerCase().includes(searchTerm.toLowerCase())
        );
        this.renderDropdownOptions(filtered);
    }

    addStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .custom-dropdown {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                z-index: 1000;
                max-height: 300px;
                overflow-y: auto;
            }
            .search-box {
                padding: 8px;
                position: sticky;
                top: 0;
                background: white;
                border-bottom: 1px solid #eee;
            }
            .dropdown-search {
                width: 100%;
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
            .options-container {
                padding: 8px 0;
            }
            .option-item {
                padding: 8px 16px;
                cursor: pointer;
            }
            .option-item:hover {
                background-color: #f5f5f5;
            }
            .selected {
                background-color: #e9ecef;
            }
            .loading-indicator {
                text-align: center;
                padding: 8px;
                color: #666;
            }
        `;
        document.head.appendChild(style);
    }
}