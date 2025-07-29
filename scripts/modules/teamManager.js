// Team System
class TeamManager {
    constructor() {
        this.teamData = null;
        this.init();
    }

    async init() {
        // Charger les données de l'équipe
        try {
            console.log('🔄 Chargement des données de l\'équipe...');
            const response = await fetch('data/team.json');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            this.teamData = await response.json();
            console.log('✅ Données de l\'équipe chargées:', this.teamData);
            this.renderTeam();
        } catch (error) {
            console.error('❌ Erreur lors du chargement des données de l\'équipe:', error);
            // Fallback avec des données par défaut
            this.loadFallbackData();
        }
    }

    loadFallbackData() {
        console.log('🔄 Chargement des données de fallback...');
        this.teamData = {
            "team": [
                {
                    "id": "noa-second",
                    "name": "Noa Second",
                    "role": "Fondateur & Game Designer",
                    "bio": "Fondateur de LaCorbeille STUDIO, game designer passionné, à l'origine des projets du studio. Gestion d'équipe et vision créative.",
                    "socials": {
                        "portfolio": "https://www.noasecond.com/",
                        "linkedin": "https://www.linkedin.com/in/noa-second/",
                        "github": "https://github.com/NoaSecond",
                        "instagram": "https://instagram.com/noa.second"
                    }
                },
                {
                    "id": "romain-varene-rebuffat",
                    "name": "Romain VARENE-REBUFFAT",
                    "role": "Testeur QA & Développement Réseau",
                    "bio": "Testeur QA spécialisé dans l'assurance qualité des jeux vidéo. Apporte également son expertise sur la partie réseau du développement.",
                    "socials": {
                        "portfolio": "https://www.root3301.fr/",
                        "linkedin": "https://www.linkedin.com/in/romain-varene-rebuffat-328782186"
                    }
                }
            ]
        };
        this.renderTeam();
    }

    renderTeam() {
        const teamContainer = document.querySelector('.team-list');
        if (!teamContainer || !this.teamData) {
            console.warn('⚠️ Conteneur d\'équipe ou données manquants');
            return;
        }

        console.log('🎨 Rendu de l\'équipe...');
        
        // Vider le conteneur existant
        teamContainer.innerHTML = '';

        // Générer le HTML pour chaque membre de l'équipe
        this.teamData.team.forEach(member => {
            const memberElement = this.createTeamMemberElement(member);
            teamContainer.appendChild(memberElement);
        });
        
        console.log('✅ Équipe rendue avec succès');
    }

    createTeamMemberElement(member) {
        const memberDiv = document.createElement('div');
        memberDiv.className = 'team-member';
        memberDiv.setAttribute('data-member-id', member.id);

        const socialsHtml = this.createSocialLinksHtml(member.socials);

        memberDiv.innerHTML = `
            <div class="team-member-content">
                <div class="team-member-info">
                    <h4>${member.name}</h4>
                    <p class="role">${member.role}</p>
                    <p class="bio">${member.bio}</p>
                </div>
                ${socialsHtml}
            </div>
        `;

        return memberDiv;
    }

    createSocialLinksHtml(socials) {
        if (!socials || Object.keys(socials).length === 0) {
            return '';
        }

        const socialIcons = {
            linkedin: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>`,
            github: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
            </svg>`,
            twitter: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
            </svg>`,
            instagram: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>`,
            artstation: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M0 17.723l2.027 3.505h.001a2.424 2.424 0 0 0 2.164 1.333h3.829l-1.944-3.308-2.074-3.53H0zm8.889-4.017L12.2 7.64a.774.774 0 0 1 .686-.4h.001a.774.774 0 0 1 .686.4l3.311 6.066-3.311 6.066a.774.774 0 0 1-.686.4h-.001a.774.774 0 0 1-.686-.4L8.889 13.706zM13.539 9.942L16.67 4.717 19.8 9.942h-6.261zM20.3 11.262h3.7l-.704 1.218a2.424 2.424 0 0 1-2.164 1.333H18.356l1.944-2.551z"/>
            </svg>`,
            behance: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.07 6.35H15.75V4.96h4.32v1.39zm-3.78 3.44c0-.72-.56-1.28-1.25-1.28s-1.25.56-1.25 1.28.56 1.28 1.25 1.28 1.25-.56 1.25-1.28zm-6.94-1.28c-.69 0-1.25.56-1.25 1.28s.56 1.28 1.25 1.28 1.25-.56 1.25-1.28-.56-1.28-1.25-1.28zM24 12c0 6.628-5.372 12-12 12S0 18.628 0 12 5.372 0 12 0s12 5.372 12 12zM8.64 15.32c1.33 0 2.4-1.07 2.4-2.4 0-1.33-1.07-2.4-2.4-2.4s-2.4 1.07-2.4 2.4c0 1.33 1.07 2.4 2.4 2.4zm6.72 0c1.33 0 2.4-1.07 2.4-2.4 0-1.33-1.07-2.4-2.4-2.4s-2.4 1.07-2.4 2.4c0 1.33 1.07 2.4 2.4 2.4z"/>
            </svg>`,
            soundcloud: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M1.175 12.225c-.051 0-.094.046-.101.105l-.233 2.154.233 2.105c.007.059.05.104.101.104.05 0 .093-.045.101-.104l.262-2.105-.262-2.154c-.008-.059-.051-.105-.101-.105zm1.49.105c-.059 0-.109.053-.117.120l-.177 2.019.177 2.071c.008.067.058.121.117.121s.109-.054.117-.121l.209-2.071-.209-2.019c-.008-.067-.058-.12-.117-.12zm1.54.048c-.067 0-.122.058-.13.132l-.152 1.971.152 2.024c.008.074.063.133.13.133.066 0 .121-.059.13-.133l.174-2.024-.174-1.971c-.009-.074-.064-.132-.13-.132zm1.534.024c-.075 0-.137.065-.146.148l-.127 1.947.127 2.014c.009.083.071.149.146.149.074 0 .136-.066.145-.149l.154-2.014-.154-1.947c-.009-.083-.071-.148-.145-.148zm1.54.011c-.083 0-.151.073-.16.164l-.115 1.936.115 2.014c.009.091.077.165.16.165.082 0 .15-.074.159-.165l.134-2.014-.134-1.936c-.009-.091-.077-.164-.159-.164zm1.547.005c-.091 0-.165.081-.174.184l-.096 1.931.096 2.014c.009.103.083.185.174.185.09 0 .164-.082.173-.185l.117-2.014-.117-1.931c-.009-.103-.083-.184-.173-.184zm1.557.001c-.099 0-.18.089-.189.202l-.078 1.93.078 2.013c.009.113.09.203.189.203.098 0 .179-.09.188-.203l.102-2.013-.102-1.93c-.009-.113-.09-.202-.188-.202zm1.563 0c-.107 0-.194.097-.203.22l-.059 1.93.059 2.013c.009.123.096.221.203.221.106 0 .193-.098.202-.221l.083-2.013-.083-1.93c-.009-.123-.096-.22-.202-.22zm1.569-.001c-.115 0-.208.105-.218.238l-.039 1.931.039 2.012c.01.133.103.239.218.239.114 0 .207-.106.217-.239l.066-2.012-.066-1.931c-.01-.133-.103-.238-.217-.238zm1.575-.003c-.123 0-.222.113-.232.256l-.02 1.934.02 2.011c.01.143.109.257.232.257.122 0 .221-.114.231-.257l.049-2.011-.049-1.934c-.01-.143-.109-.256-.231-.256zm1.58-.007c-.131 0-.237.121-.247.274l-.002 1.937v2.01c0 .153.116.275.247.275.13 0 .236-.122.246-.275v-2.01l.002-1.937c-.01-.153-.116-.274-.246-.274zm3.819-.025c-1.32 0-2.388 1.069-2.388 2.388 0 1.319 1.068 2.387 2.388 2.387h5.194c.137 0 .248-.111.248-.248v-4.279c0-.137-.111-.248-.248-.248z"/>
            </svg>`,
            spotify: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
            </svg>`,
            portfolio: `<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-1 17.5h2v-11h-2v11zm1-12.5c.69 0 1.25-.56 1.25-1.25S12.69 2 12 2s-1.25.56-1.25 1.25S11.31 5 12 5z"/>
            </svg>`
        };

        const socialLabels = {
            linkedin: 'LinkedIn',
            github: 'GitHub',
            twitter: 'X (Twitter)',
            instagram: 'Instagram',
            artstation: 'ArtStation',
            behance: 'Behance',
            soundcloud: 'SoundCloud',
            spotify: 'Spotify',
            portfolio: 'Portfolio'
        };

        const socialLinks = Object.entries(socials).map(([platform, url]) => {
            const icon = socialIcons[platform] || socialIcons.portfolio;
            const label = socialLabels[platform] || platform.charAt(0).toUpperCase() + platform.slice(1);
            
            return `
                <a href="${url}" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="${label}">
                    ${icon}
                </a>
            `;
        }).join('');

        return `
            <div class="team-member-socials">
                ${socialLinks}
            </div>
        `;
    }
}

// Initialiser le gestionnaire d'équipe
window.teamManager = new TeamManager();
