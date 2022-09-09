---
extends: _layouts.post
section: content
title: The number of weak characters in the game
problemUrl: https://leetcode.com/problems/the-number-of-weak-characters-in-the-game/
date: 2022-09-09
categories: [heap]
---

We will use a max heap with our properties and use the attack as sorting mechanism. Then we loop over our properties, pop the max item from the heap, and then we need to check the current defense, whether it is less than max defense or not. If yes, then we increase our result by 1. We update our max defense with each iteration. Finally we return our result when every elements have been popped from the heap.

```python
class Solution:
    def numberOfWeakCharacters(self, properties: List[List[int]]) -> int:
        properties = [[-attack, defence] for attack, defence in properties]
        heapq.heapify(properties)
        
        curMaxDefense, res = -math.inf, 0
        while len(properties):
            curAttack, curDefense = heapq.heappop(properties)
            if curDefense < curMaxDefense:
                res += 1
            curMaxDefense = max(curMaxDefense, curDefense)
        
        return res
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`