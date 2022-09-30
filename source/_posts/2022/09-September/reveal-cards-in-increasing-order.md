---
extends: _layouts.post
section: content
title: Reveal cards in increasing order
problemUrl: https://leetcode.com/problems/reveal-cards-in-increasing-order/
date: 2022-09-30
categories: [queue]
---

we will first sort the deck in descending order. Then we iterate over each card of the deck and append it to a queue. And before appending, if the queue is not empty, then we pop the card from the queue and append it back, so basically rotating the card. Then we append the new card in the queue. Finally we return all the elements of the queue as an array.

```python
class Solution:
    def deckRevealedIncreasing(self, deck: List[int]) -> List[int]:
        deck.sort(reverse=True)
        q = collections.deque()
        for x in deck:
            if q:
                q.appendleft(q.pop())
            q.appendleft(x)
        return list(q)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`