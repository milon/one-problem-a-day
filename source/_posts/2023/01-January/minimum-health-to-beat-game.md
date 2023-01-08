---
extends: _layouts.post
section: content
title: Minimum health to beat game
problemUrl: https://leetcode.com/problems/minimum-health-to-beat-game/
date: 2023-01-08
categories: [greedy]
---

Without considering the armor, we need 1 + total_damage amount of health to pass.

Considering the armor, we just use it to shield the most severe damage, call it max_damage, and it should save us min(armor, max_damage) amount of health. For example, armor=4, when max_damage=5, then we still take 1 health loss (saved 4 health points), and if max_damage=3, then we take 0 health loss (saved 3 health points).

Based on this idea, we just sums up all damages, and remove the amount saved by the armor, then plus 1.

```python
class Solution:
    def minimumHealth(self, damage: List[int], armor: int) -> int:
        maxDamage, totalDamage = 0, 0
        for d in damage:
            totalDamage += d
            maxDamage = max(maxDamage, d)
        
        return totalDamage - min(armor, maxDamage) + 1
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

We can achieve the same result by using `sum` and `max` built-in functions.

```python
class Solution:
    def minHealth(self, damage: List[int], armor: int) -> int:
        return max(1, sum(damage) - min(armor, max(damage)) + 1)
```