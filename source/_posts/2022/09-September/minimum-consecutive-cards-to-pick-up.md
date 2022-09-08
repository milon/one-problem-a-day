---
extends: _layouts.post
section: content
title: Minimum consecutive cards to pick up
problemUrl: https://leetcode.com/problems/minimum-consecutive-cards-to-pick-up/
date: 2022-09-08
categories: [sliding-window]
---

We will use a set to keep track of cards in the hand. Initially we will assume the current number of cards in the hand in infinity. We will have 2 pointers, we will move our right pointer, check if the number as right pointer is already exist in the set, if exists, then we remove the card from left until the card is removed, also updating the left pointer position and the current minimum cards in the hand. If the cards in the hand is still infinity after the loop is iterated over, we will  return -1 otherwise we will return the minimum number of cards in the hand.

```python
class Solution:
    def minimumCardPickup(self, cards: List[int]) -> int:
        l, res = 0, math.inf
        hand = set()
        
        for r in range(len(cards)):
            if cards[r] in hand:
                while cards[r] in hand:
                    hand.remove(cards[l])
                    l += 1
                res = min(res, r-l+2)
            hand.add(cards[r])
                
        return -1 if res == math.inf else res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`