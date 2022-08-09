---
extends: _layouts.post
section: content
title: Hand of straights
problemUrl: https://leetcode.com/problems/hand-of-straights/
date: 2022-08-09
categories: [greedy]
---

We will first check if the number of card is divisible by the group size, if not, we immediately return false. Then we count the number of cards, and create a min heap with all the distinct cards. Then we pick up the top from the min heap, and check if we have all the cards available to make a straight. If not we immediately return false, if yes, then we decrement the count of that card. If the card count becomes zero, then we remove it from the count hashmap. Finally, if we could successfully pop all the elements from the heap, we will return true.

```python
class Solution:
    def isNStraightHand(self, hand: List[int], groupSize: int) -> bool:
        if len(hand) % groupSize != 0:
            return False
        
        count = collections.Counter(hand)
        minH = list(count.keys())
        heapq.heapify(minH)
        
        while minH:
            first = minH[0]
            for i in range(first, first + groupSize):
                if i not in count:
                    return False
                count[i] -= 1
                if count[i] == 0:
                    if i != minH[0]:
                        return False
                    heapq.heappop(minH)
        return True
```

Time Complexity: `O(n*log(n))` <br/>
Space Complexity: `O(1)`