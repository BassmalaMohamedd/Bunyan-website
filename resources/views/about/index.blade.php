@extends('layouts.public')

@section('title', 'Our Legacy | Arkan Real Estate')

@section('content')
    <!-- Cinematic Hero Section -->
    <section style="min-height: 65vh; background: #0a192f; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 160px 60px 80px;">
        <div style="position: absolute; inset: 0; background: radial-gradient(circle at 70% 30%, rgba(203, 163, 101, 0.15) 0%, transparent 70%);"></div>
        <div style="position: relative; z-index: 10; text-align: center; width: 100%; max-width: 900px;">
            <div class="reveal-slow">
                <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 30px;">
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                    <span style="color: var(--primary); font-weight: 800; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase;">Innovation Center</span>
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                </div>
                <h1 style="font-size: 6rem; font-weight: 900; color: #fff; line-height: 0.95; letter-spacing: -4px; margin-bottom: 40px;">
                    Architecture as <br>
                    <span class="text-gradient">Legacy.</span>
                </h1>
                <p style="color: rgba(255,255,255,0.55); max-width: 720px; margin: 0 auto; font-size: 1.3rem; line-height: 1.9; font-weight: 300;">
                    Uncompromising precision. Meticulous engineering. Visionary growth since 2009. We representing the digital evolution of the Kingdom's specialized sectors.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Essence Content -->
    <section style="padding: 80px 60px; background: #fff;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div class="reveal" style="text-align: center; margin-bottom: 60px;">
                <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 15px;">Our Essence</span>
                <h2 style="font-size: 4rem; color: #0a192f; font-weight: 900; line-height: 1.1; letter-spacing: -3px; max-width: 1400px; margin: 0 auto;">Digital Foundations Built for Perpetual Growth.</h2>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 140px; align-items: flex-start;">
                <div class="reveal">
                    <div style="font-size: 1.25rem; line-height: 2.2; color: #64748b; font-weight: 300;">
                        <p style="margin-bottom: 40px;">
                            Arkan Real Estate was founded on the sovereign principle that specialized digital infrastructure is the center of modern economic stability. For over 15 years, we have evolved from a specialized software house into a comprehensive innovation partner for the Kingdom's elite enterprises.
                        </p>
                        <p style="margin-bottom: 50px;">
                            Our ecosystem—led by PropMate, ValueMate, and AccuMate—represents the fusion of global engineering standards with deep localized intelligence. We don't just solve problems; we engineer sustainable success through immutable data and transparent workflows.
                        </p>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px;">
                        <div style="border-left: 2px solid var(--primary); padding-left: 35px;">
                            <h4 style="font-size: 2.8rem; font-weight: 900; color: #0a192f; margin-bottom: 10px;">2009</h4>
                            <p style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px;">Established in Riyadh</p>
                        </div>
                        <div style="border-left: 2px solid var(--primary); padding-left: 35px;">
                            <h4 style="font-size: 2.8rem; font-weight: 900; color: #0a192f; margin-bottom: 10px;">950+</h4>
                            <p style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px;">Enterprise Clients</p>
                        </div>
                    </div>
                </div>
                
                <div class="reveal-scale" style="position: relative;">
                    <div style="aspect-ratio: 4/5; overflow: hidden; border-radius: 4px; box-shadow: 0 80px 160px rgba(0,0,0,0.12);">
                        <img src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&q=80&w=1200" alt="Arkan Specialized Engineering" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="glass-card" style="position: absolute; bottom: -60px; left: -60px; background: #0a192f; padding: 70px; color: #fff; max-width: 450px; box-shadow: 0 50px 100px rgba(0,0,0,0.3); border-radius: 24px;">
                        <h4 style="font-size: 2rem; font-weight: 900; color: var(--primary); margin-bottom: 25px; letter-spacing: -1px;">Vision 2030 Catalyst</h4>
                        <p style="font-size: 1.1rem; color: rgba(255,255,255,0.6); line-height: 2; font-weight: 300;">
                            We are proud contributors to the digital transformation pillars of the Kingdom's Vision 2030, enhancing market transparency and maturity through immutable code.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inviolate Values Section -->
    <section style="padding: 80px 60px; background: #f8fafc; border-top: 1px solid #f1f5f9;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div class="reveal" style="text-align: center; margin-bottom: 60px;">
                <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 15px;">Our Essence</span>
                <h2 style="font-size: 5.5rem; color: #0a192f; font-weight: 900; line-height: 1.1; letter-spacing: -3px; max-width: 1200px; margin: 0 auto;">Inviolate Values.</h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
                <div class="value-card reveal group">
                    <div class="index-number">01.</div>
                    <h4 style="font-size: 2rem; font-weight: 900; margin-bottom: 25px; letter-spacing: -1px;">Immutable Integrity</h4>
                    <p style="font-size: 1.1rem; line-height: 2; font-weight: 300;">
                        Unyielding adherence to global ethical standards and professional regulatory frameworks in every line of code we deploy.
                    </p>
                </div>
                <div class="value-card reveal group">
                    <div class="index-number">02.</div>
                    <h4 style="font-size: 2rem; font-weight: 900; margin-bottom: 25px; letter-spacing: -1px;">Technical Precision</h4>
                    <p style="font-size: 1.1rem; line-height: 2; font-weight: 300;">
                        Meticulous attention to detail in technical implementation to ensure absolute accuracy of all market insights and valuations.
                    </p>
                </div>
                <div class="value-card reveal group">
                    <div class="index-number">03.</div>
                    <h4 style="font-size: 2rem; font-weight: 900; margin-bottom: 25px; letter-spacing: -1px;">Sustainable Ecosystems</h4>
                    <p style="font-size: 1.1rem; line-height: 2; font-weight: 300;">
                        Developing software that evolves with our clients, ensuring long-term operational performance and perpetual asset value.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Framework Section -->
    <section style="padding: 80px 0; background: #fff;">
        <div class="container-fluid">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 140px; align-items: start;">
                 <div class="reveal">
                    <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 35px;">Strategic Framework</span>
                    <h2 style="font-size: 4.5rem; color: #0a192f; font-weight: 900; line-height: 1.1; margin-bottom: 50px; letter-spacing: -3px;">Engineering <br> the Extraordinary.</h2>
                 </div>
                 <div class="reveal" style="padding-top: 50px;">
                    <div style="display: flex; flex-direction: column; gap: 80px;">
                        <div style="display: flex; gap: 40px;">
                            <div style="width: 2px; height: 100px; background: var(--primary); flex-shrink: 0; opacity: 0.3;"></div>
                            <div>
                                <h4 style="font-size: 1.8rem; font-weight: 300; color: #0a192f; margin-bottom: 20px; letter-spacing: -0.5px;">Localized Intelligence</h4>
                                <p class="strategic-text">Our systems are engineered with a deep understanding of Saudi Arabia's unique real estate regulatory and cultural landscapes, ensuring absolute relevance.</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 40px;">
                            <div style="width: 2px; height: 100px; background: var(--primary); flex-shrink: 0; opacity: 0.3;"></div>
                            <div>
                                <h4 style="font-size: 1.8rem; font-weight: 300; color: #0a192f; margin-bottom: 20px; letter-spacing: -0.5px;">Digital Sovereignty</h4>
                                <p class="strategic-text">We empower enterprises with full control over their data, eliminating dependencies through proprietary, custom-engineered software ecosystems.</p>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection


